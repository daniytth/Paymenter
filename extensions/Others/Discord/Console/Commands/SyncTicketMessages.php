<?php

namespace Paymenter\Extensions\Others\Discord\Console\Commands;

use Illuminate\Console\Command;
use Paymenter\Extensions\Others\Discord\Models\DiscordTicket;
use Paymenter\Extensions\Others\Discord\Services\DiscordApi;
use Illuminate\Support\Facades\Cache;

class SyncTicketMessages extends Command
{
    protected $signature = 'discord:sync-tickets';
    protected $description = 'Pull new messages from Discord ticket channels into Paymenter';

    public function handle(): int
    {
        $extension = \App\Models\Extension::where('extension', 'Discord')->where('type', 'other')->first();
        if (!$extension) return self::SUCCESS;

        $settings = $extension->settings->pluck('value', 'key')->toArray();
        if (empty($settings['bot_token'])) return self::SUCCESS;

        $api = new DiscordApi(
            $settings['bot_token'],
            $settings['application_id'] ?? '',
            $settings['client_secret'] ?? '',
        );

        $botId = $settings['application_id'] ?? null;

        DiscordTicket::with('ticket')->chunk(50, function ($rows) use ($api, $botId) {
            foreach ($rows as $row) {
                $lastId = Cache::get("discord_ticket_last_msg:{$row->channel_id}");

                $messages = $api->getChannelMessages($row->channel_id, 20);

                foreach (array_reverse($messages) as $msg) {
                    if ($msg['author']['id'] === $botId) continue;
                    if ($lastId && $msg['id'] <= $lastId) continue;

                    // Skip if message already exists (by content match in last minute)
                    $exists = \App\Models\TicketMessage::where('ticket_id', $row->ticket_id)
                        ->where('message', $msg['content'])
                        ->where('created_at', '>=', now()->subMinutes(5))
                        ->exists();
                    if ($exists) continue;

                    \App\Models\TicketMessage::create([
                        'ticket_id' => $row->ticket_id,
                        'user_id'   => $row->ticket->user_id, // Discord üzenet a user nevében
                        'message'   => $msg['content'],
                    ]);

                    Cache::put("discord_ticket_last_msg:{$row->channel_id}", $msg['id'], now()->addDay());
                }
            }
        });

        return self::SUCCESS;
    }
}
