<!DOCTYPE html>
<html>
<head>
    <title>Rappel de Réservation</title>
</head>
<body>
    <h1>Rappel: Votre réservation se termine bientôt</h1>
    <p>Bonjour {{ $user->nom }},</p>
    <p>Nous vous rappelons que votre réservation pour le véhicule {{ $reservation->vehicule->marque }} {{ $reservation->vehicule->modele }} se termine bientôt.</p>
    <p>Date de fin : {{ $reservation->date_fin->format('d/m/Y H:i') }}</p>
    <p>Merci de votre confiance et à bientôt!</p>
</body>
</html>
