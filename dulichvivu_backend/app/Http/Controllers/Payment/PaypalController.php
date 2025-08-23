<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Departure;
use App\Models\LinkRedirect;
use App\Models\PaypalTransaction;
use App\Models\PendingBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaypalController extends Controller
{
    public function createOrder($amount, $code,  $redirect)
    {
        LinkRedirect::create([
            'booking_code' => $code,
            'url' => $redirect
        ]);

        $token = $this->getAccessToken();
        $amountUSD = round($amount / 25000, 2);

        $res = Http::withToken($token)->post($this->baseUrl() . '/v2/checkout/orders', [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('paypal.currency'),
                        'value' => $amountUSD
                    ],
                ]
            ],
            'application_context' => [
                'return_url' => route('paypal', ['pending_id' => $code]),
                'cancel_url' => route('paypal', ['pending_id' => $code]),
            ]
        ]);

        $order = $res->json();
        foreach ($order['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return $link['href'];
            }
        }
        return null;
    }

    public function getAccessToken()
    {
        $res = Http::asForm()
            ->withBasicAuth(config('paypal.client_id'), config('paypal.client_secret'))
            ->post($this->baseUrl() . '/v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ]);

        return $res->json()['access_token'];
    }

    public function baseUrl()
    {
        return config('paypal.mode') === 'sandbox'
            ? 'https://api-m.sandbox.paypal.com'
            : 'https://api-m.paypal.com';
    }

    public function confirm(Request $request)
    {
        $orderId = $request->query('token');
        $pendingId = $request->query('pending_id');
        $payerId = $request->query('PayerID');

        if (!$orderId) {
            return 'User cancelled payment';
        }

        $token = $this->getAccessToken();

        $res = Http::withToken($token)
            ->withHeaders([
                'Content-Type' => 'application/json'
            ])
            ->send('POST', "https://api-m.sandbox.paypal.com/v2/checkout/orders/{$orderId}/capture");

        $data = $res->json();


        $pendingBooking = PendingBooking::where('code', $pendingId)->firstOrFail();
        $departure = Departure::findOrFail($pendingBooking->departure_id);

        $redirectLink = LinkRedirect::where('booking_code', $pendingBooking->code)->firstOrFail();

        $isSuccess = isset($data['status']) && $data['status'] === 'COMPLETED';

        if ($isSuccess) {

            $payer_name = $data['payer']['name']['given_name'] . ' ' . $data['payer']['name']['surname'];

            $paypal = [
                'order_code' => $pendingBooking->code,
                'trans_id' => $orderId,
                'payer_id' => $payerId,
                'payer_email' => $data['payer']['email_address'],
                'payer_name' => $payer_name,
                'country_code' => $data['payer']['address']['country_code'],
                'status' => $data['status'],
                'amount' => $data['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
                'currency' => $data['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code']
            ];

            $paypalTransaction = PaypalTransaction::create($paypal);

            $bookingData = $pendingBooking->toArray();
            $bookingData['payment_status'] = 'paid';

            $booking = Booking::create($bookingData);

            $totalPerson = $booking['number_adults'] + $booking['number_children'];

            $departure->update([
                'capacity' => $departure->capacity - $totalPerson,
                'booked' => $departure->booked + 1
            ]);
        }

        $pendingBooking->delete();

        $parsedUrl = parse_url($redirectLink->url);

        parse_str($parsedUrl['query'] ?? '', $queryParams);


        unset($queryParams['status']);

        $queryParams['code-booking'] = $isSuccess ? $booking->code : 'error';

        $newQuery = http_build_query($queryParams);

        $url = $parsedUrl['scheme'] . '://' . $parsedUrl['host']
            . (isset($parsedUrl['port']) ? ':' . $parsedUrl['port'] : '')
            . (isset($parsedUrl['path']) ? $parsedUrl['path'] : '')
            . ($newQuery ? '?' . $newQuery : '');

        return redirect()->away($url);
    }
}
