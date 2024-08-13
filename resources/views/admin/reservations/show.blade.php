@extends('admin.base')

@section('title', 'Détails de la Réservation')

@section('content')
<div id="main" class="main">
    <h1>Détails de la Réservation</h1>

    <div class="form-group">
        <label>Utilisateur :</label>
        <p>{{ $reservation->user->nom }}</p>
    </div>

    <div class="form-group">
        <label>Véhicule :</label>
        <p>{{ $reservation->vehicule->marque }} {{ $reservation->vehicule->modele }}</p>
    </div>

    <div class="form-group">
        <label>Date de Début :</label>
        <p>{{ $reservation->date_debut }}</p>
    </div>

    <div class="form-group">
        <label>Date de Fin :</label>
        <p>{{ $reservation->date_fin }}</p>
    </div>

    <div class="form-group">
        <label>Coût Total :</label>
        <p>{{ $reservation->coût_total }}</p>
    </div>

    <div class="form-group">
        <label>Statut :</label>
        <p>{{ ucfirst($reservation->statut) }}</p>
    </div>

    <a href="{{ route('admin.reservations.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
