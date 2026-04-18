<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestChatUser extends Model
{
    protected $fillable = ['name', 'email', 'session_token', 'is_online', 'last_active_at'];

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
