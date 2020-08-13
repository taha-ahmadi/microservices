<?php

return [
    'feed' => [
        'base_uri' => env('FEED_SERVICE_BASE_URL'),
        'secret' => env('FEED_SERVICE_SECRET'),
    ],
    
    'hashtag' => [
        'base_uri' => env('HASHTAG_SERVICE_BASE_URL'),
        'secret' => env('HASHTAG_SERVICE_SECRET'),
    ],   
];