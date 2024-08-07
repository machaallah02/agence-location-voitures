<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('admin/AdminDashboard');
    }

    public function users()
    {
        // Récupérer les utilisateurs depuis la base de données si nécessaire
        $users = []; // Remplacez par la logique de récupération des utilisateurs
        return Inertia::render('admin/AdminUsers', [
            'users' => $users,
        ]);
    }

    public function settings()
    {
        // Récupérer les paramètres depuis la base de données si nécessaire
        $settings = []; // Remplacez par la logique de récupération des paramètres
        return Inertia::render('admin/AdminSettings', [
            'settings' => $settings,
        ]);
    }
}
