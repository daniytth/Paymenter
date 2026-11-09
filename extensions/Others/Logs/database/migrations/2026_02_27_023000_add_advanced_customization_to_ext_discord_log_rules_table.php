<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ext_discord_log_rules', function (Blueprint $table) {
            $table->string('message_regex')->nullable()->after('message_not_contains');
            $table->text('content_template')->nullable()->after('mention_levels');
            $table->string('author_name')->nullable()->after('color');
            $table->string('author_url')->nullable()->after('author_name');
            $table->string('author_icon_url')->nullable()->after('author_url');
            $table->string('thumbnail_url')->nullable()->after('author_icon_url');
            $table->string('image_url')->nullable()->after('thumbnail_url');
            $table->longText('custom_fields_json')->nullable()->after('image_url');
            $table->boolean('plain_text_mode')->default(false)->after('custom_fields_json');
            $table->unsignedSmallInteger('max_message_length')->default(4000)->after('plain_text_mode');
        });
    }

    public function down(): void
    {
        Schema::table('ext_discord_log_rules', function (Blueprint $table) {
            $table->dropColumn([
                'message_regex',
                'content_template',
                'author_name',
                'author_url',
                'author_icon_url',
                'thumbnail_url',
                'image_url',
                'custom_fields_json',
                'plain_text_mode',
                'max_message_length',
            ]);
        });
    }
};

