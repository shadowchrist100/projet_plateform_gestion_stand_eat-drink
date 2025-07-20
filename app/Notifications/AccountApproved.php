<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountApproved extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
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
            ->subject('Votre compte entrepreneur a été approuvé - Eat&Drink')
            ->greeting('Félicitations '.$notifiable->nom_complet.' !')
            ->line('Votre demande de compte entrepreneur a été approuvée par notre équipe.')
            ->line('Vous pouvez maintenant accéder à toutes les fonctionnalités de votre espace professionnel.')
            ->action('Accéder à votre tableau de bord', route('entrepreneur.dashboard'))
            ->line('Date d\'approbation : '.now()->format('d/m/Y H:i'))
            ->line('Merci pour votre confiance et à bientôt sur notre plateforme !');
    }

    /**
     * Get the array representation for database storage.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'account_approved',
            'title' => 'Compte approuvé',
            'message' => 'Votre compte entrepreneur a été approuvé. Vous pouvez maintenant accéder à votre espace professionnel.',
            'url' => route('entrepreneur.dashboard'),
            'icon' => 'check-circle',
        ];
    }
}