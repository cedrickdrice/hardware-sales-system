<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if ($this->order->status == 0 )
            $status = 'process';
        elseif($this->order->status == 1 )
            $status = 'shippped';
        elseif($this->order->status == 2 )
            $status = 'delivered';
        else 
            $status = 'canceled';
        $greeting = 'Hello ' . $this->order->user->full_name() . ',';
        $line_1 = 'Your order ' . $this->order->order_number . ' has been ' . $status;
        return (new MailMessage)
                    ->greeting($greeting)
                    ->line($line_1)
                    ->line('Thank you for using our shopping assistant mirror!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
