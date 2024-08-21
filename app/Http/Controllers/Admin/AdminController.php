<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/index');
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
