<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google'=>[
        'client_id'=>"696025184931-tud781dh1negd3h9mb8ah3pqaadgjln3.apps.googleusercontent.com",
        'client_secret'=>'UMruiDQmK8kSn8faB6CHoIdT',
        'redirect'=>'http://localhost/laravel1307_admin/public/admin/list-product-6'
    ],
    'facebook'=>[
        'client_id'=>"149870968988846",
        'client_secret'=>'6a1f01ee9d12ccf23ed7fb3c2ec4d62c',
        'redirect'=>'http://localhost/laravel1307_admin/public/admin/list-product-6'
    ]
];