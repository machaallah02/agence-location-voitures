<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        return inertia('auth/Login'); 
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
    
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            
            // Rediriger en fonction du rôle de l'utilisateur
            if ($user->role == 'admin') {
                return response()->json(['redirect' => '/admin/dashboard']);
            } else {
                return response()->json(['redirect' => '/home']);
            }
        } else {
            // Authentification échouée
            return response()->json(['message' => 'Identifiants invalides.'], 401);
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
            return 'Administrateur créé avec succès.';
        } else {
            return 'Erreur lors de la création de l\'administrateur.';
        }
    }
}
