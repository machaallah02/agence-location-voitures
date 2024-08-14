<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function process(Reservation $reservation)
    {
        // Logique pour le traitement du paiement
        // Redirigez vers une page de paiement ou intégration de passerelle de paiement

        return redirect()->route('historique')->with('success', 'Paiement traité avec succès!');
    }
}

