<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    // Afficher le formulaire de création d'un nouvel utilisateur
    public function create(): View
    {
        return view('admin.users.create');
    }

    // Enregistrer un nouvel utilisateur
    public function store(UserRequest $request): RedirectResponse
    {
        try {
        User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
        } catch (\Exception $e) {

            return redirect()->route('admin.users.index')->with('error', $e->getMessage());
        }
    }

    // Afficher les détails d'un utilisateur
    public function show(User $user): View
    {
        return view('admin.users.show', [
            'user' => $user,
        ]);
    }

    // Afficher le formulaire de modification d'un utilisateur
    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    // Mettre à jour les informations d'un utilisateur
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        try {
        $user->update([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')->with('error', $e->getMessage());
        }
    }

    // Supprimer un utilisateur
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
