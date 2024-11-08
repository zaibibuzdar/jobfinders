<?php

/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */
$c['config'] = include 'templatecookie.php';

return [
    'mode' => $c['config']['paypal_mode'], // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'client_id' => $c['config']['paypal_sandbox_client_id'],
        'client_secret' => $c['config']['paypal_sandbox_secret'],
        'app_id' => 'APP-80W284485P519543T',
    ],
    'live' => [
        'client_id' => $c['config']['paypal_live_client_id'],
        'client_secret' => $c['config']['paypal_live_secret'],
        'app_id' => env('PAYPAL_LIVE_APP_ID', ''),
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
    'currency' => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url' => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
    'locale' => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl' => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
    'active' => $c['config']['paypal_active'],
];
