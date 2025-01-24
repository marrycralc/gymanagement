<?php
namespace App\Http\Controllers\Auth;

use Stripe\Stripe;
use Illuminate\Http\Request;

class CheckoutController
{
    public function checkout_process(Request $request)
    {
        require_once base_path('vendor/autoload.php');
    
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        try {
            $customerName = $request->input('customer_name', 'Default Customer');
            $customerAddress = $request->input('customer_address', [
                'line1' => '123 Default Street',
                'line2' => '',
                'city' => 'Default City',
                'state' => 'Default State',
                'postal_code' => '000000',
                'country' => 'IN',
            ]);
    
            // Create a PaymentIntent
            $paymentIntent = $stripe->paymentIntents->create([
                'amount' => 500, // Amount in smallest currency unit
                'currency' => 'inr',
                'description' => 'Gym Service Payment',
                'automatic_payment_methods' => ['enabled' => true],
                'shipping' => [
                    'name' => $customerName,
                    'address' => $customerAddress,
                ],
            ]);
            $stripe->webhookEndpoints->create([
                'enabled_events' => ['charge.succeeded', 'charge.failed'],
                'url' => 'http://gymmanagement.local/webhook/payment_statusc',
              ]);
              
           $webhookdata =  $stripe->webhookEndpoints->retrieve('we_1Qk2B0SHpq4xQfXnR7xK4aWj', []);
            return response()->json([
                'webhookresposnse' => $webhookdata,
                'status' =>  $stripe->paymentIntents->retrieve($paymentIntent->id, []),
                'clientSecret' => $paymentIntent->client_secret,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
