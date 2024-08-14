@extends('base')

@section('title', 'Profile')

@section('content')

<div class="container my-5">
    <h1 class="text-center mb-4">Mon Profil</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Informations du Profil</div>

                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label"><strong>Nom :</strong></label>
                        <p>{{ $user->nom }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Email :</strong></label>
                        <p>{{ $user->email }}</p>
                    </div>

                    @if($user->image)
                    <div class="mb-3">
                        <label class="form-label"><strong>Photo de Profil :</strong></label>
                        <div>
                            <img src="{{ asset('storage/' . $user->image) }}" alt="Photo de profil" class="img-fluid rounded-circle" width="150">
                        </div>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label"><strong>Rôle :</strong></label>
                        <p>{{ ucfirst($user->role) }}</p>
                    </div>

                    <a href="#" class="btn btn-warning">Modifier le profil</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection