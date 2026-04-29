<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    /**
     * Show the payment page
     */
    public function index()
    {
        return view('graphics.payment');
    }

    /**
     * Create a PayPal order (called via AJAX from frontend)
     */
    public function createPaypalOrder(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'invoice_id' => 'nullable|string|max:255',
        ]);

        $clientId = config('services.paypal.client_id');
        $secret = config('services.paypal.secret');
        $mode = config('services.paypal.mode', 'sandbox');
        $baseUrl = $mode === 'sandbox'
            ? 'https://api-m.sandbox.paypal.com'
            : 'https://api-m.paypal.com';

        // 1. Get access token
        $authResponse = $this->paypalRequest('POST', $baseUrl . '/v1/oauth2/token', [
            'headers' => [
                'Accept' => 'application/json',
                'Accept-Language' => 'en_US',
                'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $secret),
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'body' => 'grant_type=client_credentials',
        ]);

        if (!$authResponse || !isset($authResponse['access_token'])) {
            return response()->json(['error' => 'Failed to authenticate with PayPal'], 500);
        }

        $accessToken = $authResponse['access_token'];

        // 2. Create order
        $orderData = [
            'intent' => 'CAPTURE',
            'application_context' => [
                'shipping_preference' => 'NO_SHIPPING',
                'user_action' => 'PAY_NOW',
                'brand_name' => 'Graphics Studio'
            ],
            'purchase_units' => [[
                'amount' => [
                    'currency_code' => 'USD',
                    'value' => number_format((float) $request->amount, 2, '.', ''),
                ],
                'description' => 'Graphics Studio Payment',
            ]],
        ];

        if ($request->invoice_id) {
            $orderData['purchase_units'][0]['invoice_id'] = $request->invoice_id;
        }

        $orderResponse = $this->paypalRequest('POST', $baseUrl . '/v2/checkout/orders', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
            ],
            'body' => json_encode($orderData),
        ]);

        if (!$orderResponse || !isset($orderResponse['id'])) {
            return response()->json(['error' => 'Failed to create PayPal order'], 500);
        }

        // Update existing record or create new one
        Payment::updateOrCreate(
            ['invoice_id' => $request->invoice_id],
            [
                'amount' => $request->amount,
                'currency' => 'USD',
                'payment_method' => Payment::METHOD_PAYPAL,
                'status' => Payment::STATUS_PENDING,
                'transaction_id' => $orderResponse['id'],
            ]
        );

        return response()->json([
            'id' => $orderResponse['id'],
        ]);
    }

    /**
     * Capture a PayPal order after approval (called via AJAX from frontend)
     */
    public function capturePaypalOrder(Request $request)
    {
        $request->validate([
            'order_id' => 'required|string',
        ]);

        $clientId = config('services.paypal.client_id');
        $secret = config('services.paypal.secret');
        $mode = config('services.paypal.mode', 'sandbox');
        $baseUrl = $mode === 'sandbox'
            ? 'https://api-m.sandbox.paypal.com'
            : 'https://api-m.paypal.com';

        // 1. Get access token
        $authResponse = $this->paypalRequest('POST', $baseUrl . '/v1/oauth2/token', [
            'headers' => [
                'Accept' => 'application/json',
                'Accept-Language' => 'en_US',
                'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $secret),
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'body' => 'grant_type=client_credentials',
        ]);

        if (!$authResponse || !isset($authResponse['access_token'])) {
            return response()->json(['error' => 'Failed to authenticate with PayPal'], 500);
        }

        $accessToken = $authResponse['access_token'];

        // 2. Capture order
        $captureResponse = $this->paypalRequest('POST', $baseUrl . '/v2/checkout/orders/' . $request->order_id . '/capture', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
            ],
            'body' => '{}',
        ]);

        if (!$captureResponse || !isset($captureResponse['status'])) {
            return response()->json(['error' => 'Failed to capture PayPal payment'], 500);
        }

        // 3. Update payment record
        $payment = Payment::where('transaction_id', $request->order_id)->first();

        if ($payment && $captureResponse['status'] === 'COMPLETED') {
            $capture = $captureResponse['purchase_units'][0]['payments']['captures'][0] ?? null;
            $payer = $captureResponse['payer'] ?? null;

            $payment->update([
                'status' => Payment::STATUS_COMPLETED,
                'payer_name' => $payer ? ($payer['name']['given_name'] ?? '') . ' ' . ($payer['name']['surname'] ?? '') : null,
                'payer_email' => $payer['email_address'] ?? null,
                'payment_details' => $captureResponse,
                'paid_at' => now(),
            ]);

            // Send confirmation emails
            $this->sendPaymentConfirmation($payment);
        }

        return response()->json([
            'status' => $captureResponse['status'],
            'details' => $captureResponse,
        ]);
    }

    /**
     * Send payment confirmation emails
     */
    private function sendPaymentConfirmation(Payment $payment)
    {
        try {
            // Email to admin
            $adminEmail = config('mail.from.address', 'admin@example.com');
            Mail::raw(
                "New payment received!\n\n" .
                "Amount: \${$payment->amount} {$payment->currency}\n" .
                "Invoice: {$payment->invoice_id}\n" .
                "Payer: {$payment->payer_name}\n" .
                "Email: {$payment->payer_email}\n" .
                "Transaction ID: {$payment->transaction_id}\n" .
                "Date: {$payment->paid_at->format('M d, Y h:i A')}\n",
                function ($message) use ($adminEmail) {
                    $message->to($adminEmail)
                        ->subject('New Payment Received - Graphics Studio');
                }
            );

            // Email to payer (if email available)
            if ($payment->payer_email) {
                Mail::raw(
                    "Thank you for your payment!\n\n" .
                    "Payment Details:\n" .
                    "Amount: \${$payment->amount} {$payment->currency}\n" .
                    "Invoice: {$payment->invoice_id}\n" .
                    "Transaction ID: {$payment->transaction_id}\n" .
                    "Date: {$payment->paid_at->format('M d, Y h:i A')}\n\n" .
                    "If you have any questions, please contact us.\n\n" .
                    "- Color Experts International, Inc.",
                    function ($message) use ($payment) {
                        $message->to($payment->payer_email)
                            ->subject('Payment Confirmation - Graphics Studio');
                    }
                );
            }
        } catch (\Exception $e) {
            Log::error('Payment confirmation email failed: ' . $e->getMessage());
        }
    }

    /**
     * Helper: Make HTTP request to PayPal API
     */
    private function paypalRequest(string $method, string $url, array $options): ?array
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

            $headers = [];
            foreach ($options['headers'] ?? [] as $key => $value) {
                $headers[] = "$key: $value";
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            if (isset($options['body'])) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $options['body']);
            }

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpCode >= 200 && $httpCode < 300) {
                return json_decode($response, true);
            }

            Log::error("PayPal API error ($httpCode): $response");
            return null;
        } catch (\Exception $e) {
            Log::error('PayPal request failed: ' . $e->getMessage());
            return null;
        }
    }
}
