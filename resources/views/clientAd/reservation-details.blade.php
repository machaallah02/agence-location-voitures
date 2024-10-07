@extends('clientAd.base')

@section('title', 'Détails de la Réservation')

@section('content')
    <main id="main" class="main">
        <div class="container my-5">
            <h1 class="text-center mb-5">Détails de la Réservation</h1>

            @if ($reservation)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 text-center">
                                @if ($reservation->vehicule->image)
                                    <img src="{{ asset('storage/' . $reservation->vehicule->image) }}" class="img-fluid rounded"
                                        alt="Image du véhicule">
                                @else
                                    <img src="https://via.placeholder.com/300" class="img-fluid rounded"
                                        alt="Image par défaut du véhicule">
                                @endif
                            </div>
                            <div class="col-md-7">
                                <h5 class="card-title">Véhicule</h5>
                                <p class="card-text"><strong>Marque:</strong> {{ $reservation->vehicule->marque }}</p>
                                <p class="card-text"><strong>Modèle:</strong> {{ $reservation->vehicule->modele }}</p>
                                <p class="card-text"><strong>Année:</strong> {{ $reservation->vehicule->année }}</p>
                                <p class="card-text"><strong>Numéro d'immatriculation:</strong>
                                    {{ $reservation->vehicule->numéro_immatriculation }}</p>

                                <h5 class="card-title mt-4">Réservation</h5>
                                <p class="card-text"><strong>Date de début:</strong>
                                    {{ $reservation->date_debut->format('d/m/Y') }}</p>
                                <p class="card-text"><strong>Date de fin:</strong>
                                    {{ $reservation->date_fin->format('d/m/Y H:i') }}</p>
                                <p class="card-text"><strong>Coût Total:</strong>
                                    {{ number_format($reservation->coût_total, 2, ',', ' ') }} franc CFA</p>
                                <p class="card-text"><strong>Date de réservation:</strong>
                                    {{ $reservation->created_at->format('d/m/Y H:i') }}</p>
                                <p class="card-text"><strong>Statut:</strong>
                                    @if ($reservation->statut == 'réservé')
                                        <span class="badge bg-success">{{ ucfirst($reservation->statut) }}</span>
                                    @elseif($reservation->statut == 'annulé')
                                        <span class="badge bg-danger">{{ ucfirst($reservation->statut) }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($reservation->statut) }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            @if ($reservation->statut =='réservé')
                            <form action="{{ route('annuler-reservation', $reservation->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="btn btn-info" type="submit">annuler</button>
                            </form>
                            @endif
                        </div>
                        <div class="row">
                            @if ($reservation->statut == 'réservé')
                                <h5 class="card-title mt-4 text-center">Paiement</h5>
                                <form action="{{ route('reservation.pay', $reservation->id) }}" method="POST"
                                    class="payment-form">
                                    @csrf
                                    <input type="hidden" name="amount"
                                        value="{{ number_format($reservation->coût_total, 2, '.', '') }}">
                                    <button class="btn btn-warning btn-lg w-100" type="submit"
                                        onclick="return confirm('Voulez-vous payer cette réservation ?')">
                                        <i class="fas fa-credit-card"></i> Payer maintenant
                                    </button>
                                </form>
                            @else
                                <p class="text-muted">Paiement non applicable</p>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info text-center">
                    Réservation non trouvée.
                </div>
            @endif
        </div>

        <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
    </main>
@endsection
