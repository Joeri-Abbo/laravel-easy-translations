<?php

return [
    'storage_path' => base_path('languages'),
    'default_language' => 'en',
    'prefix' => '',
    'middleware' => ['web'],
    'namespace' => 'JoeriAbbo\LaravelEasyTranslations\Http\Controllers',
    'routes_enabled' => env('APP_ENV') === 'local',
];
