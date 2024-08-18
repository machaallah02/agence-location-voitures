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
                                    <!-- Bouton pour ouvrir le modal de paiement -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#paymentModal" data-reservation-id="{{ $reservation->id }}">
                                        Payer
                                    </button>
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

<!-- Modal de paiement -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="paymentModalLabel">Choisir un mode de paiement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="paymentForm" method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="paymentMethod" class="form-label">Méthode de paiement</label>
                        <div class="btn btn-group w-100" data-bs-toggle="buttons">
                            <label class="btn btn-outline-primary w-100">
                                <input type="radio" name="payment_method" id="credit_card" value="credit_card" required> Espece
                            </label>
                            <label class="btn btn-outline-primary w-100">
                                <input type="radio" name="payment_method" id="paypal" value="paypal" required> PayPal
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Confirmer le paiement</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Script pour gérer l'ouverture du modal avec la réservation associée
    document.addEventListener('DOMContentLoaded', function () {
        const paymentModal = document.getElementById('paymentModal');
        const paymentForm = document.getElementById('paymentForm');
        
        paymentModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const reservationId = button.getAttribute('data-reservation-id');
            
            // Définir l'action du formulaire avec l'ID de la réservation
            paymentForm.action = `/reservations/${reservationId}/payment`;
        });
    });
</script>

@endsection
