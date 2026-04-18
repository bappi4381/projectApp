<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuestChatUser;
use App\Models\ChatMessage;
use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $users = GuestChatUser::with(['messages' => function($q) {
            $q->latest()->limit(1);
        }])->orderBy('last_active_at', 'desc')->get();

        return view('admin.chat.index', compact('users'));
    }

    public function messages($guestId)
    {
        $user = GuestChatUser::findOrFail($guestId);
        $messages = ChatMessage::where('guest_chat_user_id', $guestId)
            ->orderBy('created_at', 'asc')
            ->get();

        // Mark as seen
        ChatMessage::where('guest_chat_user_id', $guestId)
            ->where('sender_type', 'guest')
            ->update(['is_seen' => true]);

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'messages' => $messages
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'guest_id' => 'required|exists:guest_chat_users,id',
            'message' => 'required|string|max:5000'
        ]);

        $message = ChatMessage::create([
            'guest_chat_user_id' => $request->guest_id,
            'admin_id' => auth()->id(),
            'sender_type' => 'admin',
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }
}
