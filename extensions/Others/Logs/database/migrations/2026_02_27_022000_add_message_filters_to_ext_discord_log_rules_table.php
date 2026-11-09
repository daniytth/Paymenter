<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ext_discord_log_rules', function (Blueprint $table) {
            $table->string('message_contains')->nullable()->after('channels');
            $table->string('message_not_contains')->nullable()->after('message_contains');
        });
    }

    public function down(): void
    {
        Schema::table('ext_discord_log_rules', function (Blueprint $table) {
            $table->dropColumn(['message_contains', 'message_not_contains']);
        });
    }
};

