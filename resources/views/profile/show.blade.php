@extends('base')

@section('title', 'Profil')

@section('content')

<div class="container my-5">
    <h1 class="text-center mb-4">Mon Profil</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h5>Informations du Profil</h5>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        @if($user->image)
                            <img src="{{ asset('storage/' . $user->image) }}" alt="Photo de profil" class="img-fluid rounded-circle shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/profil.png') }}" alt="Photo de profil" class="img-fluid rounded-circle shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Nom :</strong></label>
                        <p class="form-control">{{ $user->nom }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Email :</strong></label>
                        <p class="form-control">{{ $user->email }}</p>
                    </div>

                    <div class="mb-3">

                        <label class="form-label"><strong>Numéro de numéro :</strong></label>
                        <p class="form-control">{{ $user->telephone ?? 'Non renseigné' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Adresse :</strong></label>
                        <p class="form-control">{{ $user->adresse ?? 'Non renseigné' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Rôle :</strong></label>
                        <p class="form-control">{{ ucfirst($user->role) }}</p>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-warning">Modifier le profil</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
