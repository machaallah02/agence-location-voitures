<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login'); 
    }

    public function postLogin(Request $request)
    {
        // Validation des données de connexion
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        // Tentative de connexion
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Redirection en fonction du rôle de l'utilisateur
            if ($user->role == 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role == 'personnel') {
                return redirect()->route('home'); 
            } elseif ($user->role == 'client') {
                // Redirection pour les clients avec un message d'information
                return redirect()->route('home')->with('success', 'Vous êtes connecté en tant que client.');
            } else {
                // Gestion d'un rôle non défini
                return redirect()->route('login')->withErrors(['error' => 'Rôle utilisateur non reconnu.']);
            }
        } else {
            // Gestion de l'échec de connexion
            return redirect()->route('login')->withErrors(['email' => 'Identifiants invalides.']);
        }
    }

    public function createAdmin()
    {
        $admin = User::create([
            'nom' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);

        if ($admin) {
            return "Admin créé";
        } else {
            return "Admin non créé";
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'role' => 'required|string|in:client,personnel,admin',
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Compte créé avec succès.');
    }

    public function showRegistrationForm()
    {
        return view('auth.register'); 
    }
}
