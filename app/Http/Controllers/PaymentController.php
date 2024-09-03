<?php

namespace App\Http\Controllers;

use Log;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function pay(Request $request, $id)
{
    try {
        $validatedData = $request->validate([
            'montant' => 'required|numeric|min:10',
        ]);
        $reservation = Reservation::findOrFail($id);

        FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
        FedaPay::setEnvironment(env('FEDAPAY_MODE'));

        $user = Auth::user();
        $transaction = Transaction::create([
            'description' => 'Paiement pour la réservation #' . $reservation->id,
            'montant' => $validatedData['montant'],
            'currency' => 'XOF',
            'callback_url' => route('payment.callback', ['reservationId' => $reservation->id]),
            'customer' => [
                'firstname' => $user->nom,
                'lastname' => $user->nom,
                'email' => $user->email,
                'phone_number' => $user->telephone ?? null,
            ]
        ]);

        $token = $transaction->generateToken();

        return response()->json([
            'token_url' => $token->url
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Erreur lors du paiement. Veuillez réessayer.',
            'details' => $e->getMessage()
        ], 500);
    }
}

    public function callback(Request $request, $reservationId)
    {
 }

}
