@extends('clientAd.base')

@section('title', 'Historique')

@section('content')
<main id="main" class="main">
<div class="container my-5">
    <h1 class="text-center mb-5">Historique des Réservations</h1>

    @if($reservations->isEmpty())
        <div class="alert alert-info text-center">
            Vous n'avez aucune réservation pour le moment.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Véhicule</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Coût Total</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Paiement</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td class="text-center">
                                <strong>{{ $reservation->vehicule->marque }}</strong><br>
                                <small>{{ $reservation->vehicule->modele }}</small>
                            </td>
                            <td class="text-center">{{ $reservation->date_debut->format('d/m/Y') }}</td>
                            <td class="text-center">{{ $reservation->date_fin->format('d/m/Y') }}</td>
                            <td class="text-center">{{ number_format($reservation->coût_total, 2, ',', ' ') }} franc CFA</td>
                            <td class="text-center">{{ $reservation->created_at }}</td>
                            <td class="text-center">
                                @if($reservation->statut == 'réservé')
                                    <span class="badge bg-success">{{ ucfirst($reservation->statut) }}</span>
                                @elseif($reservation->statut == 'annulé')
                                    <span class="badge bg-danger">{{ ucfirst($reservation->statut) }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($reservation->statut) }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($reservation->statut == 'réservé')
                                <form action="{{ route('reservation.pay', $reservation->id) }}" method="POST" class="payment-form">
                                    @csrf
                                    <input type="hidden" name="montant" value="{{ number_format($reservation->coût_total, 2, '.', '') }}">
                                    <button class="btn btn-warning btn-sm w-100" type="submit"
                                            onclick="return confirm('Voulez-vous payer cette_reservation ?')">
                                        <i class="fas fa-credit-card"></i> Payer
                                    </button>
                                </form>
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

<script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
</main>


@endsection
