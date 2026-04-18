<?php

namespace App\Http\Controllers;

use App\Models\GuestChatUser;
use App\Models\ChatMessage;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function init(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'nullable|string|max:100'
        ]);

        $user = GuestChatUser::where('email', $request->email)->first();

        if (!$user) {
            $user = GuestChatUser::create([
                'email' => $request->email,
                'name' => $request->name,
                'session_token' => Str::random(60),
                'last_active_at' => now(),
            ]);
        } else {
            if ($request->name) {
                $user->update(['name' => $request->name]);
            }
            $user->update(['last_active_at' => now()]);
        }

        $history = ChatMessage::where('guest_chat_user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'history' => $history
        ]);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'session_token' => 'required|string',
            'message' => 'required|string|max:5000'
        ]);

        $user = GuestChatUser::where('session_token', $request->session_token)->firstOrFail();

        $message = ChatMessage::create([
            'guest_chat_user_id' => $user->id,
            'sender_type' => 'guest',
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

    public function getHistory($token)
    {
        $user = GuestChatUser::where('session_token', $token)->firstOrFail();
        $history = ChatMessage::where('guest_chat_user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'status' => 'success',
            'history' => $history
        ]);
    }
}
