<?php

namespace App\Models;

use App\Events\NewMessageEvent;
use App\Notifications\MessageNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;
    protected $fillable=['user_id','chat_id','message'];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function booted()
    {
        static::created(function (ChatMessage $message){
            broadcast(new NewMessageEvent($message))->toOthers();
            $user=$message->chat->users->where('id','!=',$message->user_id);
            \Notification::send($user,new MessageNotification($message));
        });
    }
}
