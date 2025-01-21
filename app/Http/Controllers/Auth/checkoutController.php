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
            $customerEmail = $request->input('customer_email');
            $paymentMethodId = $request->input('payment_method_id'); // Payment Method from Stripe.js
            $customerAddress = $request->input('customer_address', [
                'line1' => '123 Default Street',
                'line2' => '',
                'city' => 'Default City',
                'state' => 'Default State',
                'postal_code' => '000000',
                'country' => 'IN',
            ]);
    
            // Step 2: Check if the customer exists or create a new customer
            $customer = $stripe->customers->create([
                'name' => $customerName,
                'email' => $customerEmail,
                'address' => $customerAddress,
            ]);
    
            // Step 3: Attach the payment method to the customer
            $stripe->paymentMethods->attach(
                $paymentMethodId,
                ['customer' => $customer->id]
            );
    
            // Step 4: Set the default payment method for the customer
            $stripe->customers->update(
                $customer->id,
                ['invoice_settings' => ['default_payment_method' => $paymentMethodId]]
            );
    
            // Step 5: Create a price for the subscription plan
            $price = $stripe->prices->create([
                'currency' => 'inr',
                'unit_amount' => 1000, // ₹10.00
                'recurring' => ['interval' => 'day '],
                'product_data' => ['name' => 'Gold Plan'],
            ]);
    
            // Step 6: Create the subscription
            $subscription = $stripe->subscriptions->create([
                'customer' => $customer->id,
                'items' => [
                    [
                        'price' => $price->id, // Price ID from the created price
                    ],
                ],
                'expand' => ['latest_invoice.payment_intent'], // To retrieve payment status
            ]);
    
            // Check if payment intent requires additional authentication
            if ($subscription->latest_invoice->payment_intent->status === 'requires_action') {
                return response()->json([
                    'requires_action' => true,
                    'clientSecret' => $subscription->latest_invoice->payment_intent->client_secret, // Include client secret
                ]);
            }
    
            // Return the subscription and payment intent details
            return response()->json([
                'subscription' => $subscription,
                'clientSecret' => $subscription->latest_invoice->payment_intent->client_secret, // Include client secret
            ]);
    
        } catch (\Exception $e) {
            // Return any errors encountered during the process
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    
    
}
