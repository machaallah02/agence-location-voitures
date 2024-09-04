@extends('admin.base')

@section('title', 'Planifier une Maintenance')

@section('content')
<div id="main" class="main">
    <h1>Planifier une Maintenance</h1>
    <form action="{{ route('admin.maintenances.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="vehicule_id" class="form-label">Véhicule</label>
            <select name="vehicule_id" class="form-select" required>
                @foreach($vehicules as $vehicule)
                    <option value="{{ $vehicule->id }}">{{ $vehicule->marque }} {{ $vehicule->modele }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date_maintenance" class="form-label">Date de Maintenance</label>
            <input type="date" name="date_maintenance" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="statut" class="form-label">Statut</label>
            <select name="statut" class="form-select" required>
                <option value="planifiée">Planifiée</option>
                <option value="en cours">En Cours</option>
                <option value="complétée">Complétée</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Planifier</button>
    </form>
</div>
@endsection
