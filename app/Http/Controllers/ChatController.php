<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\User;
use App\Notifications\NewMessageNotification;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function openroom()
    {
        return view('chat-global');
    }

    public function chat(User $user)
    {
        $chat = Chat::with('messages')->whereHas('participants', function ($query) {
            $query->where('user_id', auth()->id());
        })->whereHas('participants', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first();

        if (!$chat) {
            $chat = Chat::create();
            ChatUser::create(['chat_id' => $chat->id, 'user_id' => auth()->id()]);
            ChatUser::create(['chat_id' => $chat->id, 'user_id' => $user->id]);
        }

        $chat->messages = $chat->messages->sortBy('created_at');

        return view('chat', ['user' => $user, 'chat' => $chat]);
    }

    public function store(Request $request, Chat $chat)
    {
        $message = $chat->messages()->create([
            'user_id' => auth()->id(),
            'content' => $request->get('content')
        ]);

        $user = $chat->participants()->whereNot('users.id', auth()->id())->first();
        $user->notify(new NewMessageNotification(auth()->user(), $chat, $message));
        NewMessage::dispatch(auth()->id(), $chat, $message);
        return redirect()->back();
    }
}
