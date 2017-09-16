<?php

return [
    'use' => env('TIMEPIECE_CONNECTION', 'influx'),

    'connections' => [
        'influx' => [
            'host' => env('TIMEPIECE_HOST', '127.0.0.1'),
            'port' => env('TIMEPIECE_PORT', '8086'),
            'username' => env('TIMEPIECE_USERNAME', ''),
            'password' => env('TIMEPIECE_PASSWORD', ''),
            'ssl' => env('TIMEPIECE_SSL', false),
            'verify_ssl' => env('TIMEPIECE_VERIFY_SSL', false),
            'timeout' => env('TIMEPIECE_TIMEOUT', 0),
        ],
    ],
];