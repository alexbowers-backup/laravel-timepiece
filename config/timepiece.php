<?php

return [
    'default' => env('TIMEPIECE_CONNECTION', 'influx'),

    'connections' => [
        'influx' => [
            'host' => env('TIMEPIECE_HOST', '127.0.0.1'),
            'port' => env('TIMEPIECE_PORT', '8086'),
            'database' => env('TIMEPIECE_DATABASE', 'events'),
            'username' => env('TIMEPIECE_USERNAME', ''),
            'password' => env('TIMEPIECE_PASSWORD', ''),

        ],
    ],
];