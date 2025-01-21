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
           
$cuatomeroid = $stripe->customers->create([
    'email' => 'sid@gmail.com',
    'name' => 'sidharth',
    'shipping' => [
      'address' => [
        'city' => 'Brothers',
        'country' => 'US',
        'line1' => '27 Fredrick Ave',
        'postal_code' => '97712',
        'state' => 'CA',
      ],
      'name' => 'sidharth',
    ],
    'address' => [
      'city' => 'Brothers',
      'country' => 'US',
      'line1' => '27 Fredrick Ave',
      'postal_code' => '97712',
      'state' => 'CA',
    ],
  ]);
 $priceid = $stripe->prices->create([
    'currency' => 'inr',
    'unit_amount' => 1000,
    'recurring' => ['interval' => 'month'],
    'product_data' => ['name' => 'Gold Plan'],
  ]);

  $customer_id = $cuatomeroid->id;
  $price_id = $priceid->id;

  // Create the subscription with the customer ID, price ID, and necessary options.
  $subscription = $stripe->subscriptions->create([
      'customer' => $customer_id,
      'items' => [[
          'price' => $price_id,
      ]],
      'payment_behavior' => 'default_incomplete',
      'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
      'expand' => ['latest_invoice.payment_intent'],
  ]);

  // Return the subscription ID and client secret as a JSON response.
  header('Content-Type: application/json');
  echo json_encode([
      'subscriptionId' => $subscription->id,
      'clientSecret' => $subscription->latest_invoice->payment_intent->client_secret,
  ]);
    
        } catch (\Exception $e) {
            // Return any errors encountered during the process
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    
    
}
