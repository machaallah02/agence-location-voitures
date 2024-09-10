<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Payment;
use App\Models\Vehicule;
use App\Models\Maintenance;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
{
    // Récupération des totaux
    $totalVehicles = Vehicule::count();
    $totalUsers = User::count();
    $totalReservations = Reservation::count();
    $totalMaintenances = Maintenance::count();
    $totalPayments = Payment::sum('montant');

    // Récupération des activités récentes
    $recentActivities = collect();

    // Récupération des voitures récentes
    $recentVehicles = Vehicule::latest('created_at')->take(5)->get();

    // Récupération des utilisateurs récents
    $recentUsers = User::latest('created_at')->take(5)->get();

    // Préparation des données pour le graphique
    $reservationsByMonth = Reservation::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('count', 'month')
        ->toArray();

    return view('admin.index', [
        'totalVehicles' => $totalVehicles,
        'totalUsers' => $totalUsers,
        'totalReservations' => $totalReservations,
        'totalMaintenances' => $totalMaintenances,
        'totalPayments' => $totalPayments,
        'recentActivities' => $recentActivities,
        'recentVehicles' => $recentVehicles,
        'recentUsers' => $recentUsers,
        'reservationsByMonth' => $reservationsByMonth,
    ]);
}




    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }
    public function users()
    {
        // Récupérer les utilisateurs depuis la base de données si nécessaire
        $users = User::all();
        return inertia('admin/users/index', [
            'users' => $users,
        ]);
    }

    public function settings()
    {
        // Récupérer les paramètres depuis la base de données si nécessaire
        $settings = [];
        return inertia('admin/AdminSettings', [
            'settings' => $settings,
        ]);
    }
}
