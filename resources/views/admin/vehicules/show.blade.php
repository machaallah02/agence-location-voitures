@extends('admin.base')

@section('title', 'Détails du Véhicule')

@section('content')
<div id="main" class="main">
    <h1>Détails du Véhicule</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $vehicule->marque }} {{ $vehicule->modele }}</h5>
            <p><strong>Année:</strong> {{ $vehicule->année }}</p>
            <p><strong>Numéro d'Immatriculation:</strong> {{ $vehicule->numéro_immatriculation }}</p>
            <p><strong>Statut de Disponibilité:</strong> {{ $vehicule->statut_disponibilité }}</p>
            <p><strong>Tarif Location:</strong> {{ $vehicule->tarif_location }}</p>
            @if ($vehicule->image)
                <img src="{{ asset('storage/' . $vehicule->image) }}" alt="Image du Véhicule" style="max-width: 300px;">
            @endif
            <a href="{{ route('admin.vehicules.edit', $vehicule->id) }}" class="btn btn-warning mt-3">Modifier</a>
            <form action="{{ route('admin.vehicules.destroy', $vehicule->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')">Supprimer</button>
            </form>
            <a href="{{ route('admin.vehicules.index') }}" class="btn btn-secondary mt-3">Retour à la Liste</a>
        </div>
    </div>
</div>
@endsection
