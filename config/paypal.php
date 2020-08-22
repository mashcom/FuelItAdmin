<?php
return [
    'client_id' => env('PAYPAL_CLIENT_ID', 'AZW1yB-6gz-Z7SqEhIp7R_m8CgN3lc1Wjrv7MJP2z6fHNYV5AU8OSsRGBCD0twG-7Se1vldpJWrmNdWH'),
    'secret' => env('PAYPAL_SECRET', 'EDEslxjMRF3bqXPFfJRo7lTwodWBJHtEfXa-ZBH3pnbI8BplUWSsy_sGpefq3H2fVhXyMeTjSeqpDNj7'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE', 'sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];
