<?php

namespace App\Http\Controllers;


use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
class PaymentController extends Controller
{
    public function checkout(Request $request) {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        // Créer une intention de paiement
        $paymentIntent = PaymentIntent::create([
            'amount' => round($request->amount * 100), // convertir en centimes
            'currency' => 'eur',
            'payment_method_types' => ['card'],
        ]);
    
        $output = [
            'clientSecret' => $paymentIntent->client_secret,
        ];
    
        return response()->json($output);
    }
}
