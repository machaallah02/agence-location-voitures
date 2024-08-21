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
                    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label"><strong>Nom :</strong></label>
                            <input type="text" name="nom" class="form-control" value="{{ $user->nom }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Email :</strong></label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Numéro de téléphone :</strong></label>
                            <input type="text" name="telephone" class="form-control" value="{{ $user->telephone ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Adresse :</strong></label>
                            <textarea name="adresse" class="form-control">{{ $user->adresse ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Photo de Profil :</strong></label>
                            <div>
                                <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/profil.png') }}" alt="Photo de profil" class="img-fluid rounded-circle mb-2" width="150">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Rôle :</strong></label>
                            <p>{{ ucfirst($user->role) }}</p>
                        </div>

                        <button type="submit" class="btn btn-success">Mettre à jour le profil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
