<?php

namespace App\Http\Controllers;

use Log;
use FedaPay\FedaPay;
use App\Models\Payment;
use FedaPay\Transaction;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function pay(Request $request, $id)
    {
        try {
            // Validation des données
            $validatedData = $request->validate([
                'amount' => 'required|numeric|min:10',
            ]);

            // Trouver la réservation
            $reservation = Reservation::findOrFail($id);

            // Configuration de FedaPay
            FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
            FedaPay::setEnvironment('live');

            // Récupérer l'utilisateur
            $user = Auth::user();

            // Créer une transaction FedaPay
            $transaction = Transaction::create([
                'description' => 'Paiement pour la réservation #' . $reservation->id,
                'amount' => 100,
                'currency' => ['iso' => 'XOF'],
                'callback_url' => route('payment.callback', ['reservationId' => $reservation->id]),
                'customer' => [
                    'firstname' => $user->nom,
                    'lastname' => $user->nom,
                    'email' => $user->email,
                    // 'phone_number' => $user->telephone ?? null,
                ]
            ]);

            // Générer le token pour la redirection de paiement
            $token = $transaction->generateToken();

            // Rediriger l'utilisateur vers l'URL de paiement
            return redirect($token->url);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erreur lors du paiement. Veuillez réessayer.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function paymentCallback(Request $request, $reservationId)
    {
        try {
            // Configuration de FedaPay
            FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
            FedaPay::setEnvironment('live');

            // Récupérer l'ID et le statut de la transaction depuis la requête
            $transactionId = $request->input('id');
            $transactionStatus = $request->input('status');

            if (!$transactionId ) {
                throw new \Exception('Informations de transaction manquantes.');
            }

            if ($transactionStatus == 'approved') {
                // La transaction est réussie
                $reservation = Reservation::findOrFail($reservationId);

                // Enregistrer le paiement dans la base de données
                Payment::create([
                    'user_id' => $reservation->user_id,
                    'reservation_id' => $reservation->id,
                    'montant' => $reservation->coût_total,
                    'méthode_paiement' => 'Fedapay',
                    'statut_paiement' => 'payé',
                    'date_transaction' => now(),
                ]);

                // Mettre à jour le statut de la réservation
                $reservation->statut = 'completé';
                $reservation->save();

                // Envoi de l'email de confirmation
                Mail::send('emails.payment_confirmation', ['reservation' => $reservation], function ($message) use ($reservation) {
                    $message->to($reservation->user->email)
                        ->subject('Confirmation de Paiement - Réservation #' . $reservation->id);
                });

                return view('clientAd.reservation-details', compact('reservation'))->with('success', 'Paiement réussi!');
            } else {
                return redirect()->route('historique')->with('error', 'Le paiement a échoué. Veuillez réessayer.');
            }
        } catch (\Exception $e) {
            return redirect()->route('historique')->with('error', 'Erreur lors du traitement du paiement: ' . $e->getMessage());
        }
    }

}
