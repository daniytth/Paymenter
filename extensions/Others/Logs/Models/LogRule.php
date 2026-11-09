<?php

namespace Paymenter\Extensions\Others\Logs\Models;

use Illuminate\Database\Eloquent\Model;

class LogRule extends Model
{
    protected $table = 'ext_discord_log_rules';

    protected $fillable = [
        'name',
        'enabled',
        'webhook_url',
        'min_level',
        'channels',
        'message_contains',
        'message_not_contains',
        'message_regex',
        'username',
        'avatar_url',
        'mention',
        'mention_levels',
        'content_template',
        'title_template',
        'description_template',
        'footer_text',
        'color',
        'author_name',
        'author_url',
        'author_icon_url',
        'thumbnail_url',
        'image_url',
        'custom_fields_json',
        'plain_text_mode',
        'max_message_length',
        'timeout_seconds',
        'include_context',
        'include_request_meta',
        'include_exception_trace',
        'tts',
    ];

    protected $casts = [
        'enabled' => 'boolean',
        'timeout_seconds' => 'integer',
        'max_message_length' => 'integer',
        'include_context' => 'boolean',
        'include_request_meta' => 'boolean',
        'include_exception_trace' => 'boolean',
        'plain_text_mode' => 'boolean',
        'tts' => 'boolean',
    ];
}
