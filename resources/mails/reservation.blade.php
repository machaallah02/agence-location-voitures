<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de Réservation</title>
</head>
<body>
    <h1>Bonjour {{ $user->name }},</h1>
    <p>Votre réservation pour le véhicule {{ $reservation->vehicule->marque }} {{ $reservation->vehicule->modele }} a été confirmée.</p>
    <p>Dates de la réservation : du {{ $reservation->date_debut->format('d/m/Y') }} au {{ $reservation->date_fin->format('d/m/Y') }}</p>
    <p>Coût total : {{ $reservation->coût_total }} €</p>
    <p>Vous pouvez payer sur la plateforme</p>
    <p>Merci pour votre confiance.</p>
</body>
</html>
