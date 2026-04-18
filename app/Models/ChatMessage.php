<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = ['guest_chat_user_id', 'admin_id', 'sender_type', 'message', 'is_seen'];

    public function user()
    {
        return $this->belongsTo(GuestChatUser::class, 'guest_chat_user_id');
    }
}
