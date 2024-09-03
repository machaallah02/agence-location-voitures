<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Vehicule;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendReservationReminder;


class ClientController extends Controller
{
    public function showReservationForm(Vehicule $vehicule)
    {
        return view('home.reservation', compact('vehicule'));
    }

public function store(Request $request)
{
    $request->validate([
        'vehicule_id' => 'required|exists:vehicules,id',
        'date_debut' => 'required|date|after_or_equal:today',
        'date_fin' => 'required|date|after_or_equal:date_debut',
    ]);

    $vehicule = Vehicule::findOrFail($request->vehicule_id);

    $dateDebut = Carbon::parse($request->date_debut);
    $dateFin = Carbon::parse($request->date_fin);

    $existingReservation = Reservation::where('vehicule_id', $vehicule->id)
        ->where(function ($query) use ($dateDebut, $dateFin) {
            $query->whereBetween('date_debut', [$dateDebut, $dateFin])
                ->orWhereBetween('date_fin', [$dateDebut, $dateFin])
                ->orWhere(function ($query) use ($dateDebut, $dateFin) {
                    $query->where('date_debut', '<=', $dateDebut)
                        ->where('date_fin', '>=', $dateFin);
                });
        })
        ->first();

    if ($existingReservation) {
        return back()->withErrors(['indisponible' => 'Le véhicule n\'est pas disponible pour la période sélectionnée.']);
    }

    $diffDays = $dateFin->diffInDays($dateDebut);
    $coût_total = $diffDays * $vehicule->tarif_location;

    $reservation = new Reservation();
    $reservation->user_id = Auth::id();
    $reservation->vehicule_id = $vehicule->id;
    $reservation->date_debut = $dateDebut;
    $reservation->date_fin = $dateFin;
    $reservation->coût_total = $coût_total;
    $reservation->statut = 'réservé';
    $reservation->save();

    // Envoi de l'email de confirmation
    Mail::send('emails.reservation', ['user' => Auth::user(), 'reservation' => $reservation], function ($message) use ($reservation) {
        $message->to(Auth::user()->email)
                ->subject('Confirmation de Réservation - ' . $reservation->vehicule->marque . ' ' . $reservation->vehicule->modele);
    });

    // Planification de l'envoi du rappel une heure avant la fin de la réservation
    $reminderTime = $dateFin->copy()->subHours(5);
    $delay = $reminderTime->diffInSeconds(now());

    if ($delay > 0) {
        SendReservationReminder::dispatch($reservation)->delay($delay);
    }

    return redirect()->route('home')->with('success', 'Réservation confirmée! Un email de confirmation vous a été envoyé.');
}



    public function historique()
    {
        $reservations = Auth::user()->reservations()->with('vehicule')->get();
        return view('clientAd.historique', compact('reservations'));
    }

    public function checkAvailability(Request $request)
    {
        $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        $exists = Reservation::where('vehicule_id', $request->vehicule_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('date_debut', [$request->date_debut, $request->date_fin])
                    ->orWhereBetween('date_fin', [$request->date_debut, $request->date_fin])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('date_debut', '<=', $request->date_debut)
                            ->where('date_fin', '>=', $request->date_fin);
                    });
            })
            ->exists();

        return response()->json(['available' => !$exists]);
    }

    public function index(){
        return view('clientAd.index');
    }

    public function profile(){
        $user = Auth::user();
        return view('clientAd.profile', compact('user'));
    }

    public function showReservationDetails($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        return view('clientAd.reservation-details', compact('reservation'));
    }
}
