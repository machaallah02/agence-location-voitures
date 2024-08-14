<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Reservation;
use Illuminate\Http\Request;

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
    
        try {
            
        
        $vehicule = Vehicule::findOrFail($request->vehicule_id);
        
        $dateDebut = new \Carbon\Carbon($request->date_debut);
        $dateFin = new \Carbon\Carbon($request->date_fin);
        $diffDays = $dateFin->diffInDays($dateDebut);
        
        $coût_total = $diffDays * $vehicule->tarif_location;
    
        $reservation = new Reservation();
        $reservation->user_id = Auth()->user()->id;
        $reservation->vehicule_id = $vehicule->id;
        $reservation->date_debut = $request->date_debut;
        $reservation->date_fin = $request->date_fin;
        $reservation->coût_total = $coût_total;
        $reservation->statut = 'réservé';
        $reservation->save();
    
        return redirect()->back()->with('success', 'Réservation confirmée!');
    } catch (\Exception $e) {
        return redirect()->route('reservation')->with('error', 'Une erreur s\'est produite.');
    }
    }
    

}
