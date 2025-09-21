<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('user.{userId}', function ($user, $userId) {
    if ($user->id === $userId) {
        return ['name' => $user->name];
    }
});

Broadcast::channel('chat.{chatId}', function ($user, $chatId) {
    return true;

    // Only allow users who belong to this chat
    return $user->chats()->where('id', $chatId)->exists();
});

Broadcast::channel('presence-chat.{chatId}', function ($user, $chatId) {
    if ($user->chats()->where('id', $chatId)->exists()) {
        return [
            'id' => $user->id,
            'name' => $user->name,
        ];
    }

    return false;
});
