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
        if (Auth::user()->id !== $user->id) {
            return redirect()->route('home')->with('error', 'Accès non autorisé');
        }

        return view('profile.show', compact('user'));
    }

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->nom = $request->input('nom');
    $user->email = $request->input('email');
    $user->telephone = $request->input('telephone');
    $user->adresse = $request->input('adresse');

    if ($request->hasFile('image')) {
        $user->image = $request->file('image')->store('images', 'public');
    }
    $user->save();
    return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
}

public function edit($id)
{
    $user = User::findOrFail($id);
    return view('profile.edit', compact('user'));
     }

}

