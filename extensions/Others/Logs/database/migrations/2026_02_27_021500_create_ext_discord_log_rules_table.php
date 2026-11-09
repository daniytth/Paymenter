<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ext_discord_log_rules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('enabled')->default(true);
            $table->text('webhook_url');
            $table->string('min_level', 20)->default('error');
            $table->string('channels')->nullable();
            $table->string('username')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('mention')->nullable();
            $table->string('mention_levels')->default('critical,alert,emergency');
            $table->string('title_template')->default('{app} · LOG EVENT');
            $table->text('description_template')->default('{message}');
            $table->string('footer_text')->default('Paymenter Discord Logs');
            $table->string('color', 20)->nullable();
            $table->unsignedSmallInteger('timeout_seconds')->default(10);
            $table->boolean('include_context')->default(true);
            $table->boolean('include_request_meta')->default(true);
            $table->boolean('include_exception_trace')->default(true);
            $table->boolean('tts')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ext_discord_log_rules');
    }
};

