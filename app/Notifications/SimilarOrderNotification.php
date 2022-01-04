<?php

namespace App\Notifications;

use App\Http\Resources\OrderResource;
use App\Http\Traits\FireBase;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SimilarOrderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $message;
    public function __construct(Order $order)
    {

        if ($order->type=='request'){
            $body="تم اضافة طلب جديد يتوافق مع عرضك";
        }else{
            $body="تم اضافة عرض جديد يتوافق مع طلبك";
        }
        $this->message=[
            'title'=>'تطبيق عقار',
            'body'=>$body,

            'title_ar'=>'تطبيق عقار',
            'body_ar'=>$body,
            'type'=>$order->type,
            'model_type'=>'order',
            'model_id'=>$order->id,
            'model'=>new OrderResource($order)
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
