<?php
namespace App\Jobs;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReservationReminder implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $reservation;

    /**
     * Create a new job instance.
     *
     * @param Reservation $reservation
     * @return void
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->reservation->user;

        Mail::send('emails.reservation_reminder', ['user' => $user, 'reservation' => $this->reservation], function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Rappel: Votre réservation se termine bientôt');
        });
    }
}
