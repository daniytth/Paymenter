<?php

namespace Paymenter\Extensions\Others\Discord\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiscordTicket extends Model
{
    protected $table = 'ext_discord_tickets';

    protected $fillable = [
        'ticket_id',
        'channel_id',
        'guild_id',
        'discord_user_id',
    ];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
