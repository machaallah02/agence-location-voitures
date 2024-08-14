<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        // Assurez-vous que l'utilisateur accède seulement à son propre profil
        if (Auth::user()->id !== $user->id) {
            return redirect()->route('home')->with('error', 'Accès non autorisé');
        }

        return view('profile.show', compact('user'));
    }
}

