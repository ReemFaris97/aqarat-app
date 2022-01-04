<?php

namespace App\Notifications;

use App\Http\Traits\FireBase;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class OrderRequestNotification extends Notification
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
        $this->message = [
            'title' => 'تطبيق عقار app',
            'body' => sprintf("حالة طلب تميز طلبك هي %s", __($order->status, [], 'ar')),
            'title_ar' => 'تطبيق عقار',
            'body_ar' => sprintf("حالة طلب تميز طلبك هي %s", __($order->status, [], 'ar')),
            'model_type' => 'chat',
            'model_id' => $order->id
        ];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', FireBaseChannel::class];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->message;
    }

    public function toFireBase($notifiable)
    {
        FireBase::notification($notifiable, $this->message['title'], $this->message['body'], $this->message);
    }
}
