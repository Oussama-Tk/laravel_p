<?php


return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    // Remplace '*' par ton URL exacte
    'allowed_origins' => ['http://localhost:8000'],

    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,

    // TRÈS IMPORTANT : Mettre à true pour autoriser les cookies
    'supports_credentials' => true, 
];
