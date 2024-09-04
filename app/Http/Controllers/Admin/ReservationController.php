<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vehicule;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    // Afficher la liste des réservations
    public function index()
    {

        $reservations = Reservation::with('user', 'vehicule')->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    // Afficher les détails d'une réservation
    public function show(Reservation $reservation)
    {
        return view('admin.reservations.show', compact('reservation'));
    }

    // Afficher le formulaire pour créer une nouvelle réservation
    public function create()
    {
        $users = User::all();
        $vehicules = Vehicule::all();
        return view('admin.reservations.create', compact('users', 'vehicules'));
    }

    public function store(Request $request)
    {
        try {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'vehicule_id' => 'required|exists:vehicules,id',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
            'coût_total' => 'required|numeric|min:0',
            'statut' => 'required|in:réservé,annulé,complété',
        ]);

        Reservation::create([
            'user_id' => $request->user_id,
            'vehicule_id' => $request->vehicule_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'coût_total' => $request->coût_total,
            'statut' => $request->statut,
        ]);

        return redirect()->route('admin.reservations.index')->with('success', 'Réservation créée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Afficher le formulaire pour éditer une réservation
    public function edit(Reservation $reservation)
    {
        $users = User::all();
        $vehicules = Vehicule::all();
        return view('admin.reservations.edit', compact('reservation', 'users', 'vehicules'));
    }

    // Mettre à jour une réservation
    public function update(Request $request, Reservation $reservation)
    {
        try {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'vehicule_id' => 'required|exists:vehicules,id',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
            'coût_total' => 'required|numeric|min:0',
            'statut' => 'required|in:réservé,annulé,complété',
        ]);

        $reservation->update([
            'user_id' => $request->user_id,
            'vehicule_id' => $request->vehicule_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'coût_total' => $request->coût_total,
            'statut' => $request->statut,
        ]);

        return redirect()->route('admin.reservations.index')->with('success', 'Réservation mise à jour avec succès.');
        } catch (\Exception $e) {

            return redirect()->route('admin.reservations.index')->with('error', $e->getMessage());
        }
    }

    // Supprimer une réservation
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('success', 'Réservation supprimée avec succès.');
    }
}
