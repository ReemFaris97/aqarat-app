<?php

namespace App\Notifications;

use App\Http\Traits\FireBase;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RenewOrderNotification extends Notification
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

        $this->message=[
            'title'=>'تطبيق عقار|| تحديث اعلانك',
            'body'=>'لقد مرت 10 ايام منذ اضافتك اعلانك يمكنك تحديث الاعلان',

            'title_ar'=>'تطبيق عقار|| تحديث اعلانك',
            'body_ar'=>'لقد مرت 10 ايام منذ اضافتك اعلانك يمكنك تحديث الاعلان',
            'model_type'=>'order',
            'model_id'=>$order->id
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
