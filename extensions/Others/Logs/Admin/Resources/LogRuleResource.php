<?php

namespace Paymenter\Extensions\Others\Logs\Admin\Resources;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Http;
use Paymenter\Extensions\Others\Logs\Admin\Resources\LogRuleResource\Pages\CreateLogRule;
use Paymenter\Extensions\Others\Logs\Admin\Resources\LogRuleResource\Pages\EditLogRule;
use Paymenter\Extensions\Others\Logs\Admin\Resources\LogRuleResource\Pages\ListLogRules;
use Paymenter\Extensions\Others\Logs\Models\LogRule;
use Throwable;

class LogRuleResource extends Resource
{
    protected static ?string $model = LogRule::class;

    protected static string|\BackedEnum|null $navigationIcon = 'ri-discord-line';

    protected static string|\BackedEnum|null $activeNavigationIcon = 'ri-discord-fill';

    protected static string|\UnitEnum|null $navigationGroup = 'Extensions';

    protected static ?string $navigationLabel = 'Discord Log Rules';

    public static function presets(): array
    {
        return [
            'critical_alerts' => [
                'name' => 'Critical Alerts',
                'enabled' => false,
                'webhook_url' => 'https://discord.com/api/webhooks/REPLACE/ME',
                'min_level' => 'critical',
                'channels' => '*',
                'message_contains' => null,
                'message_not_contains' => null,
                'message_regex' => null,
                'username' => 'Paymenter Critical',
                'avatar_url' => null,
                'mention' => '@everyone',
                'mention_levels' => 'critical,alert,emergency',
                'content_template' => null,
                'title_template' => '{app} · {level} INCIDENT',
                'description_template' => '{message}',
                'footer_text' => 'Immediate action required',
                'color' => '#ff3b30',
                'author_name' => null,
                'author_url' => null,
                'author_icon_url' => null,
                'thumbnail_url' => null,
                'image_url' => null,
                'custom_fields_json' => null,
                'plain_text_mode' => false,
                'max_message_length' => 4000,
                'timeout_seconds' => 10,
                'tts' => false,
                'include_context' => true,
                'include_request_meta' => true,
                'include_exception_trace' => true,
            ],
            'payments' => [
                'name' => 'Payment Failures',
                'enabled' => false,
                'webhook_url' => 'https://discord.com/api/webhooks/REPLACE/ME',
                'min_level' => 'error',
                'channels' => '*',
                'message_contains' => 'payment,invoice,gateway,charge',
                'message_not_contains' => null,
                'message_regex' => null,
                'username' => 'Paymenter Billing',
                'avatar_url' => null,
                'mention' => null,
                'mention_levels' => 'critical,alert,emergency',
                'content_template' => null,
                'title_template' => '{app} · PAYMENT EVENT · {level}',
                'description_template' => '{message}',
                'footer_text' => 'Billing monitoring',
                'color' => '#f39c12',
                'author_name' => null,
                'author_url' => null,
                'author_icon_url' => null,
                'thumbnail_url' => null,
                'image_url' => null,
                'custom_fields_json' => null,
                'plain_text_mode' => false,
                'max_message_length' => 4000,
                'timeout_seconds' => 10,
                'tts' => false,
                'include_context' => true,
                'include_request_meta' => true,
                'include_exception_trace' => true,
            ],
            'security' => [
                'name' => 'Security Watch',
                'enabled' => false,
                'webhook_url' => 'https://discord.com/api/webhooks/REPLACE/ME',
                'min_level' => 'warning',
                'channels' => '*',
                'message_contains' => 'auth,login,token,permission,forbidden,unauthorized',
                'message_not_contains' => null,
                'message_regex' => null,
                'username' => 'Paymenter Security',
                'avatar_url' => null,
                'mention' => null,
                'mention_levels' => 'critical,alert,emergency',
                'content_template' => null,
                'title_template' => '{app} · SECURITY · {level}',
                'description_template' => '{message}',
                'footer_text' => 'Security monitoring',
                'color' => '#8e44ad',
                'author_name' => null,
                'author_url' => null,
                'author_icon_url' => null,
                'thumbnail_url' => null,
                'image_url' => null,
                'custom_fields_json' => null,
                'plain_text_mode' => false,
                'max_message_length' => 4000,
                'timeout_seconds' => 10,
                'tts' => false,
                'include_context' => true,
                'include_request_meta' => true,
                'include_exception_trace' => true,
            ],
            'debug_stream' => [
                'name' => 'Debug Stream',
                'enabled' => false,
                'webhook_url' => 'https://discord.com/api/webhooks/REPLACE/ME',
                'min_level' => 'debug',
                'channels' => '*',
                'message_contains' => null,
                'message_not_contains' => null,
                'message_regex' => null,
                'username' => 'Paymenter Debug',
                'avatar_url' => null,
                'mention' => null,
                'mention_levels' => 'critical,alert,emergency',
                'content_template' => null,
                'title_template' => '{app} · DEBUG · {channel}',
                'description_template' => '{message}',
                'footer_text' => 'Verbose diagnostics',
                'color' => '#95a5a6',
                'author_name' => null,
                'author_url' => null,
                'author_icon_url' => null,
                'thumbnail_url' => null,
                'image_url' => null,
                'custom_fields_json' => null,
                'plain_text_mode' => false,
                'max_message_length' => 4000,
                'timeout_seconds' => 10,
                'tts' => false,
                'include_context' => true,
                'include_request_meta' => false,
                'include_exception_trace' => false,
            ],
        ];
    }

    public static function presetOptions(): array
    {
        return [
            'critical_alerts' => 'Critical Alerts',
            'payments' => 'Payment Failures',
            'security' => 'Security Watch',
            'debug_stream' => 'Debug Stream',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('preset_template')
                    ->label('Preset Template')
                    ->placeholder('Custom (no preset)')
                    ->options(self::presetOptions())
                    ->live()
                    ->dehydrated(false)
                    ->helperText('Choose a preset to auto-fill fields, then customize everything.')
                    ->afterStateUpdated(function ($state, Set $set) {
                        if (!$state || !isset(self::presets()[$state])) {
                            return;
                        }

                        foreach (self::presets()[$state] as $key => $value) {
                            $set($key, $value);
                        }
                    }),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Critical alerts'),
                Toggle::make('enabled')
                    ->default(true),
                TextInput::make('webhook_url')
                    ->required()
                    ->url()
                    ->columnSpanFull(),
                Select::make('min_level')
                    ->required()
                    ->default('error')
                    ->options([
                        'debug' => 'debug',
                        'info' => 'info',
                        'notice' => 'notice',
                        'warning' => 'warning',
                        'error' => 'error',
                        'critical' => 'critical',
                        'alert' => 'alert',
                        'emergency' => 'emergency',
                    ]),
                TextInput::make('channels')
                    ->placeholder('stack,daily,single or *')
                    ->helperText('Optional comma-separated channels. Leave empty for all channels.')
                    ->columnSpanFull(),
                TextInput::make('message_contains')
                    ->placeholder('payment,invoice,gateway')
                    ->helperText('Optional comma-separated keywords. Rule only matches if message contains one.')
                    ->columnSpanFull(),
                TextInput::make('message_not_contains')
                    ->placeholder('deprecated')
                    ->helperText('Optional comma-separated keywords to exclude.')
                    ->columnSpanFull(),
                TextInput::make('message_regex')
                    ->placeholder('timeout|deadlock|cannot connect')
                    ->helperText('Optional regex pattern (without delimiters), case-insensitive.')
                    ->columnSpanFull(),
                TextInput::make('username')
                    ->placeholder('Paymenter Logs'),
                TextInput::make('avatar_url')
                    ->url()
                    ->placeholder('https://...')
                    ->columnSpanFull(),
                TextInput::make('mention')
                    ->placeholder('@everyone or <@&ROLE_ID>'),
                TextInput::make('mention_levels')
                    ->default('critical,alert,emergency')
                    ->placeholder('critical,alert,emergency'),
                Textarea::make('content_template')
                    ->rows(2)
                    ->helperText('Optional top content text. Variables: {app}, {level}, {channel}, {env}, {message}, {time}')
                    ->columnSpanFull(),
                TextInput::make('title_template')
                    ->default('{app} · LOG EVENT')
                    ->helperText('Variables: {app}, {level}, {channel}, {env}, {message}, {time}')
                    ->columnSpanFull(),
                Textarea::make('description_template')
                    ->default('{message}')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('footer_text')
                    ->default('Paymenter Discord Logs')
                    ->columnSpanFull(),
                TextInput::make('color')
                    ->placeholder('#e74c3c or 15158332'),
                TextInput::make('author_name')
                    ->placeholder('Paymenter Logger'),
                TextInput::make('author_url')
                    ->url()
                    ->placeholder('https://status.example.com')
                    ->columnSpanFull(),
                TextInput::make('author_icon_url')
                    ->url()
                    ->placeholder('https://...')
                    ->columnSpanFull(),
                TextInput::make('thumbnail_url')
                    ->url()
                    ->placeholder('https://...')
                    ->columnSpanFull(),
                TextInput::make('image_url')
                    ->url()
                    ->placeholder('https://...')
                    ->columnSpanFull(),
                Textarea::make('custom_fields_json')
                    ->rows(4)
                    ->helperText('Optional JSON array: [{"name":"Service","value":"Billing","inline":true}]')
                    ->columnSpanFull(),
                Toggle::make('plain_text_mode')
                    ->helperText('Send as plain text only (no embed).')
                    ->default(false),
                TextInput::make('max_message_length')
                    ->numeric()
                    ->default(4000)
                    ->minValue(100)
                    ->maxValue(4000),
                TextInput::make('timeout_seconds')
                    ->numeric()
                    ->default(10)
                    ->minValue(1)
                    ->maxValue(30),
                Toggle::make('tts')
                    ->default(false),
                Toggle::make('include_context')
                    ->default(true),
                Toggle::make('include_request_meta')
                    ->default(true),
                Toggle::make('include_exception_trace')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('enabled')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('min_level')
                    ->sortable(),
                TextColumn::make('channels')
                    ->label('Channels')
                    ->toggleable()
                    ->placeholder('*'),
                TextColumn::make('message_contains')
                    ->label('Contains')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->placeholder('-'),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('test_webhook')
                    ->label('Test')
                    ->icon('ri-send-plane-line')
                    ->action(function (LogRule $record) {
                        $result = self::sendTestWebhook($record);

                        Notification::make()
                            ->title($result['ok'] ? 'Test webhook sent' : 'Test webhook failed')
                            ->body($result['message'])
                            ->{$result['ok'] ? 'success' : 'danger'}()
                            ->send();
                    }),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLogRules::route('/'),
            'create' => CreateLogRule::route('/create'),
            'edit' => EditLogRule::route('/{record}/edit'),
        ];
    }

    public static function sendTestWebhook(LogRule $rule): array
    {
        $replacements = [
            '{app}' => strtoupper((string) config('app.name', 'Paymenter')),
            '{level}' => 'ERROR',
            '{channel}' => 'stack',
            '{env}' => (string) app()->environment(),
            '{message}' => 'This is a test log message from Discord Log Rules.',
            '{time}' => now()->toDateTimeString(),
        ];

        $contentTemplate = trim((string) ($rule->content_template ?: ''));
        $content = $contentTemplate !== '' ? strtr($contentTemplate, $replacements) : null;
        if (!empty($rule->mention)) {
            $content = trim(((string) $rule->mention) . "\n" . (string) $content);
        }

        if ($rule->plain_text_mode) {
            if (!$content) {
                $content = '[TEST] ' . strtr((string) ($rule->description_template ?: '{message}'), $replacements);
            }

            $payload = [
                'username' => (string) ($rule->username ?: 'Paymenter Logs'),
                'content' => str($content)->limit(max(100, (int) ($rule->max_message_length ?: 4000)))->toString(),
                'tts' => (bool) $rule->tts,
            ];

            if (!empty($rule->avatar_url)) {
                $payload['avatar_url'] = (string) $rule->avatar_url;
            }
        } else {
        $embed = [
            'title' => strtr((string) ($rule->title_template ?: '{app} · LOG EVENT'), $replacements),
            'description' => str(self::withTemplateFallback((string) ($rule->description_template ?: '{message}'), $replacements, '{message}'))
                ->limit(max(100, (int) ($rule->max_message_length ?: 4000)))->toString(),
            'color' => self::parseColor((string) $rule->color, 15158332),
            'timestamp' => now()->toIso8601String(),
            'fields' => [
                [
                    'name' => 'Level',
                    'value' => 'ERROR',
                    'inline' => true,
                ],
                [
                    'name' => 'Channel',
                    'value' => 'stack',
                    'inline' => true,
                ],
                [
                    'name' => 'Environment',
                    'value' => (string) app()->environment(),
                    'inline' => true,
                ],
                [
                    'name' => 'Template',
                    'value' => 'Webhook test generated from admin panel.',
                    'inline' => false,
                ],
            ],
            'footer' => [
                'text' => (string) ($rule->footer_text ?: 'Paymenter Discord Logs'),
            ],
        ];

            if (!empty($rule->author_name)) {
                $embed['author'] = array_filter([
                    'name' => (string) $rule->author_name,
                    'url' => (string) $rule->author_url,
                    'icon_url' => (string) $rule->author_icon_url,
                ]);
            }
            if (!empty($rule->thumbnail_url)) {
                $embed['thumbnail'] = ['url' => (string) $rule->thumbnail_url];
            }
            if (!empty($rule->image_url)) {
                $embed['image'] = ['url' => (string) $rule->image_url];
            }

            $customFields = self::parseCustomFields((string) ($rule->custom_fields_json ?: ''));
            if (count($customFields) > 0) {
                $embed['fields'] = array_merge($embed['fields'], $customFields);
            }

            $payload = [
                'username' => (string) ($rule->username ?: 'Paymenter Logs'),
                'embeds' => [$embed],
                'tts' => (bool) $rule->tts,
            ];

            if ($content) {
                $payload['content'] = str($content)->limit(1800)->toString();
            }
        }

        if (!empty($rule->avatar_url)) {
            $payload['avatar_url'] = (string) $rule->avatar_url;
        }

        try {
            $response = Http::timeout(max(1, (int) $rule->timeout_seconds))
                ->post((string) $rule->webhook_url, $payload);

            if (!$response->successful()) {
                return [
                    'ok' => false,
                    'message' => 'HTTP ' . $response->status() . ': ' . str($response->body())->limit(180),
                ];
            }

            return [
                'ok' => true,
                'message' => 'Webhook responded with HTTP ' . $response->status() . '.',
            ];
        } catch (Throwable $e) {
            return [
                'ok' => false,
                'message' => str($e->getMessage())->limit(180),
            ];
        }
    }

    private static function parseColor(string $hexOrInt, int $default): int
    {
        $value = trim($hexOrInt);
        if ($value === '') {
            return $default;
        }

        if (is_numeric($value)) {
            return max(0, (int) $value);
        }

        $normalized = ltrim($value, '#');
        if (preg_match('/^[0-9a-fA-F]{6}$/', $normalized)) {
            return (int) hexdec($normalized);
        }

        return $default;
    }

    private static function parseCustomFields(string $json): array
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
            $name = trim((string) ($item['name'] ?? ''));
            $value = trim((string) ($item['value'] ?? ''));
            if ($name === '' || $value === '') {
                continue;
            }

            $fields[] = [
                'name' => str($name)->limit(256)->toString(),
                'value' => str($value)->limit(1024)->toString(),
                'inline' => (bool) ($item['inline'] ?? false),
            ];
        }

        return array_slice($fields, 0, 10);
    }

    private static function withTemplateFallback(string $template, array $replacements, string $fallback): string
    {
        $template = trim($template);
        if ($template === '') {
            $template = $fallback;
        }

        return strtr($template, $replacements);
    }
}
