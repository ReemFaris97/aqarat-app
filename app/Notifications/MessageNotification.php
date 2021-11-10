<?php

namespace App\Notifications;

use App\Http\Traits\FireBase;
use App\Models\ChatMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $message;
    public function __construct(ChatMessage $message)
    {
        $this->message=[
            'title'=>'aqar app',
            'body'=>"You have new Message",
            'message'=>$message->message,
            'title_ar'=>'تطبيق عقار',
            'body_ar'=>'لديك رسالة جديدة',
            'model_type'=>'chat',
            'model_id'=>$message->chat_id,
            'type'=>object_get($message->chat->model,'type','advertisement'),
            'order'=>[
                'id'=>$message->chat->model->id,
                'name'=>$message->chat->model->name,
                'user_id'=>$message->chat->model->user_id
            ]
        ];

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database',FireBaseChannel::class];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->message;
    }
    public function toFireBase($notifiable)
    {
        FireBase::notification($notifiable,$this->message['title'],$this->message['body'],$this->message);
    }
}
