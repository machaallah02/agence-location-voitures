@extends('base')

@section('title', 'Historique')

@section('content')

<div class="container my-5">
    <h1 class="text-center mb-5">Historique des Réservations</h1>
    
    @if($reservations->isEmpty())
        <div class="alert alert-info text-center">
            Vous n'avez aucune réservation pour le moment.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Véhicule</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Coût Total</th>
                        <th>Statut</th>
                        <th>Paiement</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->vehicule->marque }} {{ $reservation->vehicule->modele }}</td>
                            <td>{{ $reservation->date_debut->format('d/m/Y') }}</td>
                            <td>{{ $reservation->date_fin->format('d/m/Y') }}</td>
                            <td>{{ $reservation->coût_total }} €</td>
                            <td>
                                @if($reservation->statut == 'réservé')
                                    <span class="badge bg-success">{{ ucfirst($reservation->statut) }}</span>
                                @elseif($reservation->statut == 'annulé')
                                    <span class="badge bg-danger">{{ ucfirst($reservation->statut) }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($reservation->statut) }}</span>
                                @endif
                            </td>
                            <td>
                                @if($reservation->statut == 'réservé')
                                    <a href="{{ route('payment.process', $reservation->id) }}" class="btn btn-warning btn-sm">Payer</a>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
    
@endsection