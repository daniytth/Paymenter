<?php

namespace Paymenter\Extensions\Others\Logs;

use App\Attributes\ExtensionMeta;
use App\Classes\Extension\Extension;
use App\Helpers\ExtensionHelper;
use Illuminate\Support\HtmlString;
use Illuminate\Log\Events\MessageLogged;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Paymenter\Extensions\Others\Logs\Admin\Resources\LogRuleResource;
use Paymenter\Extensions\Others\Logs\Models\LogRule;
use Throwable;

#[ExtensionMeta(
    name: 'Discord Logs',
    description: 'Send Paymenter logs to Discord webhooks with rich configurable embeds.',
    version: '1.1.0',
    author: 'Custom',
    url: 'https://discord.com'
)]
class Logs extends Extension
{
    private static bool $sending = false;

    private const LEVEL_RANK = [
        'debug' => 100,
        'info' => 200,
        'notice' => 250,
        'warning' => 300,
        'error' => 400,
        'critical' => 500,
        'alert' => 550,
        'emergency' => 600,
    ];

    private const LEVEL_COLOR = [
        'debug' => 8421504,
        'info' => 3447003,
        'notice' => 10181046,
        'warning' => 16776960,
        'error' => 15158332,
        'critical' => 10038562,
        'alert' => 13632027,
        'emergency' => 13632027,
    ];

    public function installed()
    {
        ExtensionHelper::runMigrations('extensions/Others/Logs/database/migrations');
    }

    public function uninstalled()
    {
        ExtensionHelper::rollbackMigrations('extensions/Others/Logs/database/migrations');
    }

    public function upgraded($oldVersion = null)
    {
        $this->installed();
    }

    public function getConfig($values = [])
    {
        try {
            $link = LogRuleResource::getUrl();
            $label = new HtmlString('Manage webhook rules from <a class="text-primary-600" href="' . $link . '">Discord Log Rules</a>.');
        } catch (Throwable) {
            $label = new HtmlString('Enable extension, then manage webhook rules from the admin resource.');
        }

        return [
            [
                'name' => 'notice',
                'type' => 'placeholder',
                'label' => $label,
            ],
            [
                'name' => 'legacy_fallback_enabled',
                'label' => 'Enable Legacy Single Webhook Fallback',
                'type' => 'checkbox',
                'database_type' => 'boolean',
                'required' => false,
                'default' => true,
            ],
            [
                'name' => 'webhook_url',
                'label' => 'Legacy Discord Webhook URL',
                'type' => 'text',
                'required' => false,
            ],
            [
                'name' => 'min_level',
                'label' => 'Legacy Minimum Log Level',
                'type' => 'select',
                'required' => false,
                'default' => 'error',
                'options' => [
                    'debug' => 'debug',
                    'info' => 'info',
                    'notice' => 'notice',
                    'warning' => 'warning',
                    'error' => 'error',
                    'critical' => 'critical',
                    'alert' => 'alert',
                    'emergency' => 'emergency',
                ],
            ],
            [
                'name' => 'username',
                'label' => 'Legacy Username',
                'type' => 'text',
                'required' => false,
                'default' => 'Paymenter Logs',
            ],
            [
                'name' => 'avatar_url',
                'label' => 'Legacy Avatar URL',
                'type' => 'text',
                'required' => false,
            ],
            [
                'name' => 'mention',
                'label' => 'Legacy Mention',
                'type' => 'text',
                'required' => false,
            ],
            [
                'name' => 'include_context',
                'label' => 'Legacy Include Context',
                'type' => 'checkbox',
                'database_type' => 'boolean',
                'required' => false,
                'default' => true,
            ],
            [
                'name' => 'include_request_meta',
                'label' => 'Legacy Include Request Metadata',
                'type' => 'checkbox',
                'database_type' => 'boolean',
                'required' => false,
                'default' => true,
            ],
            [
                'name' => 'include_exception_trace',
                'label' => 'Legacy Include Exception Trace',
                'type' => 'checkbox',
                'database_type' => 'boolean',
                'required' => false,
                'default' => true,
            ],
        ];
    }

    public function boot()
    {
        Gate::policy(LogRule::class, Policies\LogRulePolicy::class);

        Event::listen('permissions', function () {
            return [
                'admin.logs_rules.view' => 'View Discord Log Rules',
                'admin.logs_rules.create' => 'Create Discord Log Rules',
                'admin.logs_rules.update' => 'Update Discord Log Rules',
                'admin.logs_rules.delete' => 'Delete Discord Log Rules',
            ];
        });

        Event::listen(MessageLogged::class, function (MessageLogged $event): void {
            $this->forwardToDiscord($event);
        });
    }

    private function forwardToDiscord(MessageLogged $event): void
    {
        if (self::$sending) {
            return;
        }

        $level = strtolower((string)$event->level);
        self::$sending = true;

        try {
            $channel = property_exists($event, 'channel')
                ? (string)($event->channel ?: 'default')
                : 'default';

            $hasRule = false;
            foreach (LogRule::query()->where('enabled', true)->get() as $rule) {
                $hasRule = true;
                if (!$this->passesLevelFilter($level, (string)$rule->min_level)) {
                    continue;
                }
                if (!$this->matchesChannel($channel, (string)$rule->channels)) {
                    continue;
                }
                if (!$this->matchesMessage(
                    (string)$event->message,
                    (string)($rule->message_contains ?? ''),
                    (string)($rule->message_not_contains ?? ''),
                    (string)($rule->message_regex ?? '')
                )) {
                    continue;
                }

                $payload = $this->buildRulePayload($event, $level, $channel, $rule);
                Http::timeout(max(1, (int)$rule->timeout_seconds))->post((string)$rule->webhook_url, $payload);
            }

            if (!$hasRule && $this->configBool('legacy_fallback_enabled', true)) {
                $legacyWebhook = trim((string)($this->config('webhook_url') ?: ''));
                if ($legacyWebhook !== '' && $this->passesLevelFilter($level, (string)$this->config('min_level'))) {
                    $payload = $this->buildLegacyPayload($event, $level, $channel);
                    Http::timeout(10)->post($legacyWebhook, $payload);
                }
            }
        } catch (Throwable) {
            // Avoid recursive logging loops if webhook delivery fails.
        } finally {
            self::$sending = false;
        }
    }

    private function buildRulePayload(MessageLogged $event, string $level, string $channel, LogRule $rule): array
    {
        $options = [
            'username' => $rule->username,
            'avatar_url' => $rule->avatar_url,
            'mention' => $rule->mention,
            'mention_levels' => $rule->mention_levels,
            'content_template' => $rule->content_template,
            'include_context' => (bool)$rule->include_context,
            'include_request_meta' => (bool)$rule->include_request_meta,
            'include_exception_trace' => (bool)$rule->include_exception_trace,
            'title_template' => $rule->title_template,
            'description_template' => $rule->description_template,
            'footer_text' => $rule->footer_text,
            'color' => $rule->color,
            'author_name' => $rule->author_name,
            'author_url' => $rule->author_url,
            'author_icon_url' => $rule->author_icon_url,
            'thumbnail_url' => $rule->thumbnail_url,
            'image_url' => $rule->image_url,
            'custom_fields_json' => $rule->custom_fields_json,
            'plain_text_mode' => (bool)$rule->plain_text_mode,
            'max_message_length' => (int)$rule->max_message_length,
            'tts' => (bool)$rule->tts,
        ];

        return $this->buildPayloadFromOptions($event, $level, $channel, $options);
    }

    private function buildLegacyPayload(MessageLogged $event, string $level, string $channel): array
    {
        $options = [
            'username' => (string)($this->config('username') ?: 'Paymenter Logs'),
            'avatar_url' => (string)$this->config('avatar_url'),
            'mention' => (string)$this->config('mention'),
            'mention_levels' => 'critical,alert,emergency',
            'content_template' => null,
            'include_context' => $this->configBool('include_context', true),
            'include_request_meta' => $this->configBool('include_request_meta', true),
            'include_exception_trace' => $this->configBool('include_exception_trace', true),
            'title_template' => '{app} · LOG EVENT',
            'description_template' => '{message}',
            'footer_text' => 'Paymenter Discord Logs',
            'color' => null,
            'author_name' => null,
            'author_url' => null,
            'author_icon_url' => null,
            'thumbnail_url' => null,
            'image_url' => null,
            'custom_fields_json' => null,
            'plain_text_mode' => false,
            'max_message_length' => 4000,
            'tts' => false,
        ];

        return $this->buildPayloadFromOptions($event, $level, $channel, $options);
    }

    private function buildPayloadFromOptions(MessageLogged $event, string $level, string $channel, array $options): array
    {
        $fields = [
            [
                'name' => 'Level',
                'value' => strtoupper($level),
                'inline' => true,
            ],
            [
                'name' => 'Channel',
                'value' => $channel,
                'inline' => true,
            ],
            [
                'name' => 'Environment',
                'value' => (string)app()->environment(),
                'inline' => true,
            ],
        ];

        if ((bool)($options['include_request_meta'] ?? true)) {
            $fields = array_merge($fields, $this->requestFields());
        }

        $context = is_array($event->context) ? $event->context : [];
        $exception = null;
        if (isset($context['exception']) && $context['exception'] instanceof Throwable) {
            $exception = $context['exception'];
            unset($context['exception']);
        }

        if ((bool)($options['include_context'] ?? true) && count($context) > 0) {
            $fields[] = [
                'name' => 'Context',
                'value' => $this->codeBlock($this->truncate($this->jsonEncode($context), 980)),
                'inline' => false,
            ];
        }

        if ($exception instanceof Throwable) {
            $fields[] = [
                'name' => 'Exception',
                'value' => $this->codeBlock($this->truncate($this->formatException($exception), 980)),
                'inline' => false,
            ];
        }

        if ((bool)($options['include_exception_trace'] ?? true) && $exception instanceof Throwable) {
            $fields[] = [
                'name' => 'Trace',
                'value' => $this->codeBlock($this->truncate($exception->getTraceAsString(), 980)),
                'inline' => false,
            ];
        }

        $titleTemplate = (string)($options['title_template'] ?? '{app} · LOG EVENT');
        $descriptionTemplate = (string)($options['description_template'] ?? '{message}');
        $footerText = (string)($options['footer_text'] ?? 'Paymenter Discord Logs');
        $contentTemplate = (string)($options['content_template'] ?? '');
        $maxMessageLength = max(100, min(4000, (int)($options['max_message_length'] ?? 4000)));

        $replacements = [
            '{app}' => strtoupper((string)config('app.name', 'Paymenter')),
            '{level}' => strtoupper($level),
            '{channel}' => $channel,
            '{env}' => (string)app()->environment(),
            '{message}' => (string)$event->message,
            '{time}' => now()->toDateTimeString(),
        ];

        $content = trim(strtr($contentTemplate, $replacements));

        $payload = [
            'username' => (string)($options['username'] ?: 'Paymenter Logs'),
            'tts' => (bool)($options['tts'] ?? false),
        ];

        if ((bool)($options['plain_text_mode'] ?? false)) {
            $plain = $content !== '' ? $content : strtr($descriptionTemplate, $replacements);
            $payload['content'] = $this->truncate($plain, $maxMessageLength);
        } else {
            $embed = [
                'title' => $this->truncate(strtr($titleTemplate, $replacements), 256),
                'description' => $this->truncate(strtr($descriptionTemplate, $replacements), $maxMessageLength),
                'color' => $this->resolveColor((string)($options['color'] ?? ''), $level),
                'timestamp' => now()->toIso8601String(),
                'fields' => $fields,
                'footer' => [
                    'text' => $this->truncate($footerText, 2048),
                ],
            ];

            $authorName = trim((string)($options['author_name'] ?? ''));
            if ($authorName !== '') {
                $embed['author'] = array_filter([
                    'name' => $this->truncate($authorName, 256),
                    'url' => trim((string)($options['author_url'] ?? '')),
                    'icon_url' => trim((string)($options['author_icon_url'] ?? '')),
                ]);
            }

            $thumbnailUrl = trim((string)($options['thumbnail_url'] ?? ''));
            if ($thumbnailUrl !== '') {
                $embed['thumbnail'] = ['url' => $thumbnailUrl];
            }

            $imageUrl = trim((string)($options['image_url'] ?? ''));
            if ($imageUrl !== '') {
                $embed['image'] = ['url' => $imageUrl];
            }

            $customFields = $this->parseCustomFields((string)($options['custom_fields_json'] ?? ''));
            if (count($customFields) > 0) {
                $embed['fields'] = array_merge($embed['fields'], $customFields);
            }

            $payload['embeds'] = [$embed];
            if ($content !== '') {
                $payload['content'] = $this->truncate($content, 1800);
            }
        }

        $avatarUrl = trim((string)($options['avatar_url'] ?: ''));
        if ($avatarUrl !== '') {
            $payload['avatar_url'] = $avatarUrl;
        }

        $mention = trim((string)($options['mention'] ?: ''));
        $mentionLevels = $this->csvToArray((string)($options['mention_levels'] ?: 'critical,alert,emergency'));
        if ($mention !== '' && in_array($level, $mentionLevels, true)) {
            $payload['content'] = $mention;
        }

        return $payload;
    }

    private function resolveColor(string $hexOrInt, string $level): int
    {
        $value = trim($hexOrInt);
        if ($value === '') {
            return self::LEVEL_COLOR[$level] ?? 9807270;
        }

        if (is_numeric($value)) {
            return max(0, (int)$value);
        }

        $normalized = ltrim($value, '#');
        if (preg_match('/^[0-9a-fA-F]{6}$/', $normalized)) {
            return (int)hexdec($normalized);
        }

        return self::LEVEL_COLOR[$level] ?? 9807270;
    }

    private function requestFields(): array
    {
        if (app()->runningInConsole() || !app()->bound('request')) {
            return [];
        }

        try {
            $request = request();
            if (!$request) {
                return [];
            }

            $fields = [
                [
                    'name' => 'Request',
                    'value' => $this->truncate($request->method() . ' ' . $request->fullUrl(), 1020),
                    'inline' => false,
                ],
            ];

            $ip = (string)($request->ip() ?: '');
            if ($ip !== '') {
                $fields[] = [
                    'name' => 'IP',
                    'value' => $ip,
                    'inline' => true,
                ];
            }

            $userId = auth()->id();
            if ($userId) {
                $fields[] = [
                    'name' => 'User ID',
                    'value' => (string)$userId,
                    'inline' => true,
                ];
            }

            return $fields;
        } catch (Throwable) {
            return [];
        }
    }

    private function matchesChannel(string $channel, string $channelsCsv): bool
    {
        $channelsCsv = trim($channelsCsv);
        if ($channelsCsv === '' || $channelsCsv === '*') {
            return true;
        }

        $accepted = $this->csvToArray($channelsCsv);
        if (count($accepted) === 0) {
            return true;
        }

        return in_array(strtolower($channel), $accepted, true);
    }

    private function matchesMessage(string $message, string $mustContainCsv, string $mustNotContainCsv, string $regex): bool
    {
        $message = strtolower($message);

        $mustContain = $this->csvToArray($mustContainCsv);
        if (count($mustContain) > 0) {
            $matched = false;
            foreach ($mustContain as $needle) {
                if ($needle !== '' && str_contains($message, $needle)) {
                    $matched = true;
                    break;
                }
            }
            if (!$matched) {
                return false;
            }
        }

        $mustNotContain = $this->csvToArray($mustNotContainCsv);
        foreach ($mustNotContain as $needle) {
            if ($needle !== '' && str_contains($message, $needle)) {
                return false;
            }
        }

        $regex = trim($regex);
        if ($regex !== '') {
            $pattern = '~' . str_replace('~', '\~', $regex) . '~i';
            $result = @preg_match($pattern, $message);
            if ($result !== 1) {
                return false;
            }
        }

        return true;
    }

    private function passesLevelFilter(string $level, string $minimumLevel): bool
    {
        $current = self::LEVEL_RANK[$level] ?? 0;
        $minimumLevel = strtolower(trim($minimumLevel)) ?: 'error';
        $minimum = self::LEVEL_RANK[$minimumLevel] ?? self::LEVEL_RANK['error'];

        return $current >= $minimum;
    }

    private function csvToArray(string $csv): array
    {
        return array_values(array_filter(array_unique(array_map(
            fn ($item) => strtolower(trim((string)$item)),
            explode(',', $csv)
        ))));
    }

    private function parseCustomFields(string $json): array
    {
        $json = trim($json);
        if ($json === '') {
            return [];
        }

        $decoded = json_decode($json, true);
        if (!is_array($decoded)) {
            return [];
        }

        $fields = [];
        foreach ($decoded as $item) {
            if (!is_array($item)) {
                continue;
            }

            $name = trim((string)($item['name'] ?? ''));
            $value = trim((string)($item['value'] ?? ''));
            if ($name === '' || $value === '') {
                continue;
            }

            $fields[] = [
                'name' => $this->truncate($name, 256),
                'value' => $this->truncate($value, 1024),
                'inline' => (bool)($item['inline'] ?? false),
            ];
        }

        return array_slice($fields, 0, 10);
    }

    private function formatException(Throwable $exception): string
    {
        return get_class($exception) . ': ' . $exception->getMessage()
            . ' in ' . $exception->getFile() . ':' . $exception->getLine();
    }

    private function codeBlock(string $content): string
    {
        return "```" . "\n" . $content . "\n" . "```";
    }

    private function jsonEncode(array $data): string
    {
        $json = json_encode(
            $data,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_PRETTY_PRINT
        );

        if (!is_string($json) || $json === '') {
            return print_r($data, true);
        }

        return $json;
    }

    private function truncate(string $value, int $limit): string
    {
        if (strlen($value) <= $limit) {
            return $value;
        }

        return substr($value, 0, max(0, $limit - 3)) . '...';
    }

    private function configBool(string $key, bool $default = false): bool
    {
        $value = $this->config($key);
        if ($value === null || $value === '') {
            return $default;
        }

        if (is_bool($value)) {
            return $value;
        }

        return in_array(strtolower((string)$value), ['1', 'true', 'on', 'yes'], true);
    }
}
