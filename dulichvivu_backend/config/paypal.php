<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'client_secret' => env('PAYPAL_CLIENT_SECRET'),
    'mode' => env('PAYPAL_MODE', 'sandbox'), // sandbox or live
    'currency' => env('PAYPAL_CURRENCY', 'USD'),
];
