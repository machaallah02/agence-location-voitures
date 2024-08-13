@extends('admin.base')

@section('title', 'Détails de l\'utilisateur')

@section('content')
<div id="main" class="main">
    <h1>Détails de l'utilisateur</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->nom }}</h5>
            <p class="card-text"><strong>Email :</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Rôle :</strong> {{ $user->role }}</p>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</div>
@endsection
