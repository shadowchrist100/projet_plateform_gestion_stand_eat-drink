<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountRejected extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var string
     */
    public $raison;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $raison)
    {
        $this->raison = $raison;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Votre demande de compte entrepreneur - Eat&Drink')
            ->greeting('Bonjour ' . $notifiable->nom_complet . ',')
            ->line('Nous regrettons de vous informer que votre demande de compte entrepreneur n\'a pas pu être approuvée.')
            ->line('**Raison du rejet :**')
            ->line($this->raison)
            ->line('')
            ->line('Vous pouvez :')
            ->line('- Nous contacter pour plus d\'informations')
            ->line('- Soumettre une nouvelle demande avec des informations complémentaires')
            ->action('Modifier ma demande', route('register'))
            ->line('')
            ->line('Cordialement,')
            ->line('L\'équipe Eat&Drink');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'account_rejected',
            'title' => 'Demande rejetée',
            'message' => 'Votre demande de compte entrepreneur a été rejetée. Raison : ' . $this->raison,
            'url' => route('register'),
            'icon' => 'times-circle',
        ];
    }
}