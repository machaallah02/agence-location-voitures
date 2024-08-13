@extends('admin.base')

@section('title', 'Liste des Véhicules')

@section('content')
<div id="main" class="main">
    <h1>Liste des Véhicules</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('admin.vehicules.create') }}" class="btn btn-primary mb-3">Ajouter un Véhicule</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Numéro d'Immatriculation</th>
                <th>Statut de Disponibilité</th>
                <th>Tarif Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicules as $vehicule)
                <tr>
                    <td>{{ $vehicule->marque }}</td>
                    <td>{{ $vehicule->modele }}</td>
                    <td>{{ $vehicule->numéro_immatriculation }}</td>
                    <td>{{ $vehicule->statut_disponibilité }}</td>
                    <td>{{ $vehicule->tarif_location }}</td>
                    <td>
                        <a href="{{ route('admin.vehicules.show', $vehicule->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('admin.vehicules.edit', $vehicule->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('admin.vehicules.destroy', $vehicule->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
