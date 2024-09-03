<?php

namespace App\Notifications;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationConfirmed extends Notification implements ShouldQueue
{
    use Queueable;

    protected $reservation;

    /**
     * Create a new notification instance.
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Confirmation de Réservation')
                    ->greeting('Bonjour ' . $notifiable->name . ',')
                    ->line('Votre réservation pour le véhicule ' . $this->reservation->vehicule->marque . ' ' . $this->reservation->vehicule->modele . ' a été confirmée.')
                    ->line('Votre réservation est du ' . $this->reservation->date_debut->format('d/m/Y') . ' au ' . $this->reservation->date_fin->format('d/m/Y') . '.')
                    ->line('Le coût total est de ' . $this->reservation->coût_total . ' €.')
                    ->line('Payer Maintenant sur la page de votre espace client.')
                    ->line('Merci de votre confiance!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
