<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserUpdateRequest;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    // Display the list of users
    public function index(): Response
    {
        $users = User::all();
        return inertia('admin/users/index', [
            'users' => $users,
        ]);
    }

    // Show the form to create a new user
    public function create(): Response
    {
        return inertia('admin/users/create');
    }

    // Store a new user
    public function store(UserRequest $request)
    {
        User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    // Show the details of a user
    public function show(User $user): Response
    {
        return inertia('admin/users/show', [
            'user' => $user,
        ]);
    }

    // Show the form to edit a user
    public function edit(User $user): Response
    {
        return inertia('admin/users/edit', [
            'user' => $user,
        ]);
    }

    // Update the user's information
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    // Delete a user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
