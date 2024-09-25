<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.globalroom', function ($user) {
    return ['id' => $user->id, 'name' => $user->name];
});

Broadcast::channel('chat.{chat_id}', function($user, $chat_id) {
    return $user->chats()->where('chat_id', $chat_id)->first();
});
