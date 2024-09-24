<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ChatUser extends Pivot
{
    protected $fillable = [
        'chat_id',
        'user_id',
    ];
}
