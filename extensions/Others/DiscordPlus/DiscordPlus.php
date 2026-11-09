<?php

/**
 * DiscordPlus Extension for Paymenter
 * 
 * Created by: Exp (Discord: exp_yt)
 * Company: ExpHost - https://www.exphost.net/
 * 
 * This code is the intellectual property of Exp and ExpHost.
 * Unauthorized copying, modification, or distribution is prohibited.
 */

namespace Paymenter\Extensions\Others\DiscordPlus;

use App\Classes\Extension\Extension;
use App\Events\Invoice\Finalized as InvoiceCreated;
use App\Events\Invoice\Paid as InvoicePaid;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class DiscordPlus extends Extension
{
    public function getName(): string
    {
        return 'DiscordPlus';
    }

    public function getDescription(): string
    {
        return 'Sends Discord DMs to users when invoices are created or paid.';
    }

    public function getVersion(): string
    {
        return '1.0.0';
    }

    public function getAuthor(): string
    {
        return 'Exp_YT';
    }

    public function boot(): void
    {
        $botToken = $this->config('discord_bot_token');
        if (!$botToken) return;

        app()->bind(\App\Http\Controllers\SocialLoginController::class, function () {
            return new \Paymenter\Extensions\Others\DiscordPlus\SocialLoginController();
        });

        Event::listen(InvoiceCreated::class, function ($event) use ($botToken) {
            $this->sendDm($event->invoice, 'invoice_created', $botToken);
        });

        Event::listen(InvoicePaid::class, function ($event) use ($botToken) {
            $this->sendDm($event->invoice, 'invoice_paid', $botToken);
        });
    }

    public function getConfig($values = [])
    {
        return [
            [
                'name' => 'discord_bot_token',
                'type' => 'text',
                'label' => 'Discord Bot Token',
                'required' => true,
                'encrypted' => true,
            ],
        ];
    }

    private function sendDm($invoice, $type, $botToken)
    {
        if (!$invoice || !$invoice->user) {
            return;
        }
        $user = $invoice->user;
        $discordId = $user->discord_id;
        $botToken = trim($botToken);

        if (empty($discordId) || !is_string($discordId) || !ctype_digit((string)$discordId)) {
            return;
        }

        $company = \Config::get('app.name', 'Paymenter');
        $invoiceUrl = \URL::to("/invoices/{$invoice->id}");
        $amount = (string)$invoice->formattedTotal;
        $dueDate = $invoice->due_at ? $invoice->due_at->format('d M Y') : 'N/A';

        if ($type === 'invoice_created') {
            $embed = [
                'embeds' => [[
                    'title' => '🧾 New Invoice Created',
                    'color' => 0x7289DA,
                    'description' => "A new invoice has been generated for your account.\n[View & Pay Invoice]({$invoiceUrl})",
                    'fields' => [
                        [ 'name' => 'Invoice #', 'value' => "#{$invoice->number}", 'inline' => true ],
                        [ 'name' => 'Amount Due', 'value' => $amount, 'inline' => true ],
                        [ 'name' => 'Due Date', 'value' => ($dueDate !== 'N/A' ? "`{$dueDate}`" : '*N/A*'), 'inline' => false ],
                    ],
                    'footer' => [ 'text' => $company ],
                ]]
            ];
        } else {
            $embed = [
                'embeds' => [[
                    'title' => '✅ Invoice Paid',
                    'color' => 0x43B581,
                    'description' => "Thank you for your payment!\n[View Invoice]({$invoiceUrl})",
                    'fields' => [
                        [ 'name' => 'Invoice #', 'value' => "#{$invoice->number}", 'inline' => true ],
                        [ 'name' => 'Amount', 'value' => $amount, 'inline' => true ],
                    ],
                    'footer' => [ 'text' => $company ],
                ]]
            ];
        }

        $dmResponse = \Http::withHeaders([
                'Authorization' => 'Bot ' . $botToken,
                'Content-Type' => 'application/json',
            ])
            ->post('https://discord.com/api/v10/users/@me/channels', [
                'recipient_id' => $discordId,
            ]);

        if ($dmResponse->failed()) {
            \Log::error('[DiscordPlus] Failed to create DM channel for discord_id: ' . $discordId . '. Response: ' . $dmResponse->body());
            return;
        }

        $channelId = $dmResponse->json('id');
        if (!$channelId) {
            \Log::error('[DiscordPlus] No channel ID returned for discord_id: ' . $discordId . '. Response: ' . $dmResponse->body());
            return;
        }

        $msgResponse = \Http::withHeaders([
                'Authorization' => 'Bot ' . $botToken,
                'Content-Type' => 'application/json',
            ])
            ->post("https://discord.com/api/v10/channels/{$channelId}/messages", $embed);

        if ($msgResponse->failed()) {
            \Log::error('[DiscordPlus] Failed to send DM to channel: ' . $channelId . '. Response: ' . $msgResponse->body());
        }
    }

    public function enabled(): void
    {
        if (!\Schema::hasColumn('users', 'discord_id')) {
            \Artisan::call('migrate', [
                '--path' => 'extensions/Others/DiscordPlus/migrations/2025_08_27_000000_add_discord_id_to_users_table.php',
                '--force' => true,
            ]);
        }
    }
    public function disabled(): void {}
    public function updated(): void {}
    public function install(): void {}
}
