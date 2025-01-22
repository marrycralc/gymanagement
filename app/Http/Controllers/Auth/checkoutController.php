<?php




namespace App\Http\Controllers\Auth;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Exception\ApiErrorException;
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
    
            // Create a PaymentIntent with customer details
            $paymentIntent = $stripe->paymentIntents->create([
                'payment_method_types' => ['klarna'],
                'amount' => 500, // Amount in smallest currency unit (e.g., 500 paise = ₹5)
                'currency' => 'inr',
                'description' => 'Export transaction for gym services',
                'automatic_payment_methods' => ['enabled' => true],
                'shipping' => [
                    'name' => $customerName,
                    'address' => $customerAddress,
                ],
            ]);
            return response()->json([
                'clientSecret' => $paymentIntent->client_secret,
            ]);
        } catch (\Exception $e) {
            Log::error('Stripe error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}
