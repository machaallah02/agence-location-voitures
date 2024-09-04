@extends('admin.base')

@section('title', 'Modifier une Réservation')

@section('content')
<div id="main" class="main">
    <h1>Modifier une Réservation</h1>

    <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">Utilisateur</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $reservation->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->nom }}
                    </option>
                @endforeach
            </select>
            @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="vehicule_id">Véhicule</label>
            <select name="vehicule_id" id="vehicule_id" class="form-control" required>
                @foreach($vehicules as $vehicule)
                    <option value="{{ $vehicule->id }}" {{ old('vehicule_id', $reservation->vehicule_id) == $vehicule->id ? 'selected' : '' }}>
                        {{ $vehicule->marque }} {{ $vehicule->modele }}
                    </option>
                @endforeach
            </select>
            @error('vehicule_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="date_debut">Date de Début</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control" value="{{ old('date_debut', $reservation->date_debut) }}" required>
            @error('date_debut') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="date_fin">Date de Fin</label>
            <input type="date" name="date_fin" id="date_fin" class="form-control" value="{{ old('date_fin', $reservation->date_fin) }}" required>
            @error('date_fin') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="coût_total">Coût Total</label>
            <input type="number" name="coût_total" id="coût_total" class="form-control" step="0.01" value="{{ old('coût_total', $reservation->coût_total) }}" required>
            @error('coût_total') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="statut">Statut</label>
            <select name="statut" id="statut" class="form-control" required>
                <option value="réservé" {{ old('statut', $reservation->statut) == 'réservé' ? 'selected' : '' }}>Réservé</option>
                <option value="annulé" {{ old('statut', $reservation->statut) == 'annulé' ? 'selected' : '' }}>Annulé</option>
                <option value="complété" {{ old('statut', $reservation->statut) == 'complété' ? 'selected' : '' }}>Complété</option>
            </select>
            @error('statut') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-warning">Mettre à Jour</button>
    </form>
</div>
@endsection
