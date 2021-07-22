<?php

return [
    'seed' => [
        'dev_name' => env('DEV_NAME', 'test'),
        'dev_email' => env('DEV_EMAIL', 'ryo.promocoes@gmail.com'),
        'dev_password' => env('DEV_PASSWORD', 'secret'),
    ],
    'admin' => [
        'prefix' => env('ADMIN_PREFIX', 'admin'),
        'roles' => [
            'administrator' => 'administrator',
            'moderator' => 'moderator',
            'professor' => 'professor',
        ],
    ],
];