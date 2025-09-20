<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    // List all chats for the logged-in user
    public function index()
    {
        $chats = Chat::with(['userOne', 'userTwo', 'messages' => fn ($q) => $q->latest()->limit(1)])
            ->where('user_one_id', auth()->id())
            ->orWhere('user_two_id', auth()->id())
            ->get();

        return view('chat.index', compact('chats'));
    }

    // Show a specific chat
    public function show($chatId)
    {
        // Sidebar list: all chats for the logged-in user with last message
        $chats = Chat::with([
            'userOne.userImages',
            'userTwo.userImages',
            'messages' => fn ($q) => $q->latest()->limit(1),
        ])
            ->where(fn ($q) => $q->where('user_one_id', auth()->id())
                ->orWhere('user_two_id', auth()->id()))
            ->get();

        // Active chat + full messages thread
        $chat = Chat::with([
            'userOne.userImages',
            'userTwo.userImages',
            'messages.sender',
        ])
            ->where('id', $chatId)
            ->where(fn ($q) => $q->where('user_one_id', auth()->id())
                ->orWhere('user_two_id', auth()->id()))
            ->firstOrFail();

        // Mark other side’s messages as read
        $chat->messages()
            ->where('sender_id', '!=', auth()->id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return view('chat.show', compact('chats', 'chat'));
    }

    // Start a new chat (or fetch existing)
    public function start($userId)
    {
        $chat = Chat::firstOrCreate(
            [
                'user_one_id' => min(auth()->id(), $userId),
                'user_two_id' => max(auth()->id(), $userId),
            ]
        );

        return redirect()->route('chat.show', $chat->id);
    }

    // Send a message
    public function send(Request $request, $chatId)
    {
        $request->validate(['content' => 'required|string']);

        $chat = Chat::findOrFail($chatId);

        $chat->messages()->create([
            'sender_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back();
    }

    // Delete a chat
    public function destroy($chatId)
    {
        $chat = Chat::findOrFail($chatId);

        if ($chat->user_one_id == auth()->id() || $chat->user_two_id == auth()->id()) {
            $chat->delete();
        }

        return redirect()->route('chat.index');
    }
}
