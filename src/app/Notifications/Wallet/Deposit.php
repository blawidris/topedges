<?php

namespace App\Notifications\Wallet;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Deposit extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public Transaction $trans)
    {
        //
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
        $trans = $this->trans;
        $user = $this->trans->user;

        return (new MailMessage)
            ->subject('Deposit')
            ->greeting('Dear ' . ucfirst($user->f_name) . ' ,')
            ->line("We are writing to inform you that your recent deposit of {$trans->price_amount} USD with reference no: $trans->payment_id failed to process.")
            ->line('We apologize for any inconvenience this may cause.')
            ->line("To resolve this issue, please contact our customer support team using the live chat feature on our website. Our team will be able to assist you in completing your deposit.")
            ->line('Thank you for your understanding.');
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
