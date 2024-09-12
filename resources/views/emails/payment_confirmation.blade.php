<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de Paiement</title>
</head>
<body>
    <h1>Confirmation de Paiement</h1>
    <p>Bonjour {{ $reservation->user->nom }},</p>
    <p>Nous vous confirmons que votre paiement pour la réservation #{{ $reservation->id }} a été effectué avec succès.</p>
    <p>Details de la réservation :</p>
    <ul>
        <li>Date de début : {{ $reservation->date_debut->format('d/m/Y') }}</li>
        <li>Date de fin : {{ $reservation->date_fin->format('d/m/Y') }}</li>
        <li>Montant : {{ $reservation->coût_total }} XOF</li>
    </ul>
    <p>Merci pour votre confiance !</p>
</body>
</html>
