@extends('admin.base')

@section('title', 'Liste des Réservations')

@section('content')
<div id="main" class="main">
    <h1>Liste des Réservations</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Utilisateur</th>
                <th>Véhicule</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Coût Total</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->user->nom }}</td>
                <td>{{ $reservation->vehicule->marque }} {{ $reservation->vehicule->modele }}</td>
                <td>{{ $reservation->date_debut }}</td>
                <td>{{ $reservation->date_fin }}</td>
                <td>{{ $reservation->coût_total }}</td>
                <td>{{ ucfirst($reservation->statut) }}</td>
                <td>
                    <a href="{{ route('admin.reservations.show', $reservation->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
