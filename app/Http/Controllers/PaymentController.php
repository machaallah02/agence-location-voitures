<?php

namespace App\Http\Controllers;

use Log;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use App\Models\Reservation;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // PaymentController.php
    public function pay(Request $request, $reservationId)
    {
        // Configure FedaPay
        FedaPay::setApiKey('FEDAPAY_SECRET_KEY');
        FedaPay::setEnvironment('FEDAPAY_MODE'); 
    
        // Validation des données d'entrée
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
    
        try {
            // Création de la transaction avec FedaPay
            $transaction = Transaction::create([
                'description' => 'Paiement pour la réservation #' . $reservationId,
                'amount' => $validatedData['amount'],
                'currency' => 'XOF',
                'callback_url' => route('payment.callback', ['reservationId' => $reservationId]),
                'customer' => [
                    'firstname' => 'John',
                    'lastname' => 'Doe',
                    'email' => 'john.doe@example.com',
                    'phone_number' => '+22990000000'
                ]
            ]);
    
            // Génération du token pour le Checkout
            $token = $transaction->generateToken();
    
            return redirect($token->url);
            
        } catch (\Exception $e) {
    
            // Redirection avec message d'erreur
            return redirect()->back()->withErrors(['payment' => 'Une erreur s\'est produite lors du paiement. Veuillez réessayer.']);
        }
    }
    


    public function callback(Request $request, $reservationId)
    {
    }

}
