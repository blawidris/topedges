<?php

namespace App\Notifications\Wallet;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DepositApproval extends Notification
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
                    ->subject('Deposit Confirmed')
                    ->greeting('Dear ', $user->f_name . ' ,')
                    ->line("We are pleased to inform you that your recent deposit of $trans->price_amount USD has been successfully processed.")
                    ->line("Your funds are now available in your account")
                    ->line("Thank you for choosing our company. We appreciate your business.");
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
