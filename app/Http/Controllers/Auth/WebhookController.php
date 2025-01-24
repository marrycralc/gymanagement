<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

class WebhookController
{
    public function checkstatus(Request $request)
    {
        require_once base_path('vendor/autoload.php');
        
        // Log all headers for debugging
        error_log('Received headers: ' . print_r(getallheaders(), true));

        $headers = getallheaders();
        dd($headers);
        $sig_header = $headers['Stripe-Signature'] ?? '';

        if (empty($sig_header)) {
            error_log('Stripe-Signature header not found');
            return response('Stripe signature not found', 400);
        }

        \Stripe\Stripe::setApiKey('sk_test_51Q9lu6SHpq4xQfXnDqincjOKJABNc2kOmtM00Giie0QY1Z8IlBmbaGfS4pi2iyjAKSKXNtqdZGCGsamzgV0Tc96N00CVWVpCLG');
        
        // Retrieve the raw POST data
        $payload = $request->getContent();
        
        $endpoint_secret = 'whsec_LOeeruLbjB5iyYgrovVDl5Mhs8akYCX4'; // Your webhook signing secret
        
        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch(\UnexpectedValueException $e) {
            error_log('Invalid payload: ' . $e->getMessage());
            return response('Invalid payload', 400);
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            error_log('Invalid signature: ' . $e->getMessage());
            return response('Invalid signature', 400);
        }
        
        // Handle the event
        switch ($event->type) {
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object;
                // Handle successful payment
                break;
            // ... handle other event types
            default:
                error_log('Received unknown event type ' . $event->type);
        }
        
        return response('Webhook handled', 200);
    }
}