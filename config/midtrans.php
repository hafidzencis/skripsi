<?php


return [
    'merchantID' => env('MIDTRANS_MERCHANT_ID'),
    'clientKey' => env('MIDTRANS_CLIENT_KEY'),
    'serverKey' => env('MIDTRANS_SERVER_KEY'),
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'isSanitized' => env('MIDTRANS_IS_SANITIZED', true),
    'is3ds' => env('MIDTRANS_SERVER_KEY', true)
];

?>