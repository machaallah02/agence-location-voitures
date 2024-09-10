<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonnelController extends Controller
{

    public function index(){
        $user = auth()->user();
        $reservationsToday = Reservation::where('user_id', $user->id)
            ->whereDate('date_debut', now()->format('Y-m-d'))
            ->count();
        $totalSpendingThisMonth = Reservation::where('user_id', $user->id)
            ->whereMonth('date_debut', now()->month)
            ->sum('coût_total');
        $suggestedVehicles = Vehicule::where('type', 'SUV') // Exemples de critères
            ->orWhere('carburant', 'électrique')
            ->take(5)
            ->get();
        $reservationStats = Reservation::where('user_id', $user->id)
            ->selectRaw('DAYOFWEEK(date_debut) as day, count(*) as count')
            ->groupBy('day')
            ->get()
            ->pluck('count', 'day');
        return view('personnelAd.index', compact('reservationsToday', 'totalSpendingThisMonth', 'suggestedVehicles', 'reservationStats'));
    }
}
