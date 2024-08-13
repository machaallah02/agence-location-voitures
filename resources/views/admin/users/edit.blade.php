@extends('admin.base')

@section('title', 'Modifier l\'utilisateur')

@section('content')
<div id="main" class="main">
    <h1>Modifier l'utilisateur</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $user->nom }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe (laisser vide pour ne pas changer)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="role">Rôle</label>
            <select name="role" id="role" class="form-control" required>
                <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                <option value="personnel" @if($user->role == 'personnel') selected @endif>Personnel</option>
                <option value="client" @if($user->role == 'client') selected @endif>Client</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
