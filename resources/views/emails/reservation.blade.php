<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de Réservation</title>
    <!-- Lien vers le CDN Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="h3">Confirmation de Réservation</h1>
            </div>
            <div class="card-body">
                <h2 class="h4">Bonjour {{ $user->name }},</h2>
                <p class="mb-3">Votre réservation pour le véhicule <strong>{{ $reservation->vehicule->marque }} {{ $reservation->vehicule->modele }}</strong> a été confirmée.</p>
                <p>Dates de la réservation : du <strong>{{ $reservation->date_debut->format('d/m/Y') }}</strong> au <strong>{{ $reservation->date_fin->format('d/m/Y') }}</strong></p>
                <p class="mt-4 bold text-center text-uppercase text-danger">Coût total : <strong>{{ $reservation->coût_total }} €</strong></p>
                <p class="mt-4">Vous pouvez payer sur la plateforme dans votre espace client ou directement à la récupération du véhicule à l'agence.</p>
                <p class="mt-4">Merci pour votre confiance.</p>
            </div>
            <div class="card-footer text-muted">
                Agence de Location de Voitures
            </div>
        </div>
    </div>
</body>
</html>

