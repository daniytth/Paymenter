<?php

namespace Paymenter\Extensions\Others\Discord\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DiscordApi
{
    private const BASE = 'https://discord.com/api/v10';

    public function __construct(
        private string $botToken,
        private string $clientId,
        private string $clientSecret,
    ) {}

    public function getUser(string $accessToken): ?array
    {
        $response = Http::withToken($accessToken, 'Bearer')
            ->get(self::BASE . '/users/@me');

        return $response->successful() ? $response->json() : null;
    }

    public function exchangeCode(string $code, string $redirectUri): ?array
    {
        $response = Http::asForm()->post(self::BASE . '/oauth2/token', [
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type'    => 'authorization_code',
            'code'          => $code,
            'redirect_uri'  => $redirectUri,
        ]);

        return $response->successful() ? $response->json() : null;
    }

    public function assignRole(string $guildId, string $userId, string $roleId): bool
    {
        $response = Http::withToken($this->botToken, 'Bot')
            ->put(self::BASE . "/guilds/{$guildId}/members/{$userId}/roles/{$roleId}");

        if (!$response->successful()) {
            Log::warning('Discord API: failed to assign role', [
                'guild_id' => $guildId,
                'user_id' => $userId,
                'role_id' => $roleId,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
        }

        return $response->successful();
    }

    public function removeRole(string $guildId, string $userId, string $roleId): bool
    {
        $response = Http::withToken($this->botToken, 'Bot')
            ->delete(self::BASE . "/guilds/{$guildId}/members/{$userId}/roles/{$roleId}");

        if (!$response->successful()) {
            Log::warning('Discord API: failed to remove role', [
                'guild_id' => $guildId,
                'user_id' => $userId,
                'role_id' => $roleId,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
        }

        return $response->successful();
    }

    public function sendDm(string $discordUserId, array $payload): bool
    {
        // Open DM channel
        $channel = Http::withToken($this->botToken, 'Bot')
            ->post(self::BASE . '/users/@me/channels', ['recipient_id' => $discordUserId]);

        if (!$channel->successful()) {
            return false;
        }

        $channelId = $channel->json('id');

        $response = Http::withToken($this->botToken, 'Bot')
            ->post(self::BASE . "/channels/{$channelId}/messages", $payload);

        return $response->successful();
    }

    public function getMember(string $guildId, string $userId): ?array
    {
        $response = Http::withToken($this->botToken, 'Bot')
            ->get(self::BASE . "/guilds/{$guildId}/members/{$userId}");

        return $response->successful() ? $response->json() : null;
    }

    public function sendMessage(string $channelId, array $payload): bool
    {
        $response = Http::withToken($this->botToken, 'Bot')
            ->post(self::BASE . "/channels/{$channelId}/messages", $payload);

        return $response->successful();
    }

    // ============================================================
    // === ÚJ === Ticket csatorna kezelés
    // ============================================================

    /**
     * Új szöveges csatorna létrehozása a guildben.
     * $payload támogatja: name, type, topic, parent_id, permission_overwrites, position.
     */
    public function createChannel(string $guildId, array $payload): ?array
    {
        $response = Http::withToken($this->botToken, 'Bot')
            ->post(self::BASE . "/guilds/{$guildId}/channels", $payload);

        if (!$response->successful()) {
            Log::warning('Discord API: failed to create channel', [
                'guild_id' => $guildId,
                'status'   => $response->status(),
                'body'     => $response->body(),
            ]);
            return null;
        }

        return $response->json();
    }

    /**
     * Csatorna törlése. 404-et is sikernek tekintünk (már nem létezik).
     */
    public function deleteChannel(string $channelId): bool
    {
        $response = Http::withToken($this->botToken, 'Bot')
            ->delete(self::BASE . "/channels/{$channelId}");

        if (!$response->successful() && $response->status() !== 404) {
            Log::warning('Discord API: failed to delete channel', [
                'channel_id' => $channelId,
                'status'     => $response->status(),
                'body'       => $response->body(),
            ]);
            return false;
        }

        return true;
    }

    /**
     * Csatorna üzeneteinek lekérése (legfrissebb elöl).
     * $after alapján csak az adott üzenet utániakat kérjük le.
     */
    public function getChannelMessages(string $channelId, int $limit = 50, ?string $after = null): array
    {
        $query = ['limit' => max(1, min(100, $limit))];
        if ($after) {
            $query['after'] = $after;
        }

        $response = Http::withToken($this->botToken, 'Bot')
            ->get(self::BASE . "/channels/{$channelId}/messages", $query);

        return $response->successful() ? $response->json() : [];
    }

    /**
     * Egyetlen üzenet lekérése.
     */
    public function getMessage(string $channelId, string $messageId): ?array
    {
        $response = Http::withToken($this->botToken, 'Bot')
            ->get(self::BASE . "/channels/{$channelId}/messages/{$messageId}");

        return $response->successful() ? $response->json() : null;
    }

    /**
     * Csatorna permission overwrite beállítása.
     * $type: 0 = role, 1 = member.
     */
    public function setChannelPermission(
        string $channelId,
        string $overwriteId,
        int $type,
        array $allow = [],
        array $deny = []
    ): bool {
        $response = Http::withToken($this->botToken, 'Bot')
            ->put(self::BASE . "/channels/{$channelId}/permissions/{$overwriteId}", [
                'type'  => $type,
                'allow' => array_sum($allow),
                'deny'  => array_sum($deny),
            ]);

        return $response->successful();
    }
}
