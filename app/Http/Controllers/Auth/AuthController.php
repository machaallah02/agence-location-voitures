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
        return Inertia::render('auth/Login'); 
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
    
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            
            if ($user->role == 'admin') {
                return Inertia::location('/admin/index');
            } else {
                return Inertia::location('/home');
            }
        } else {
            return Inertia::render('auth/Login', [
                'errors' => ['email' => ['Identifiants invalides.']]
            ]);
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
            return Inertia::render('Success', [
                'message' => 'Administrateur créé avec succès.'
            ]);
        } else {
            return Inertia::render('Error', [
                'message' => 'Erreur lors de la création de l\'administrateur.'
            ]);
        }
    }
}
