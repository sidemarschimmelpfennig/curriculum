<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Adjust if needed
    'allowed_methods' => ['*'], // Allow all HTTP methods
    'allowed_origins' => ['http://localhost:8080'], // Allow requests from your frontend
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
