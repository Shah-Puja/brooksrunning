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
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    'braintree' => [
        'environment' => env('BRAINTREE_ENVIRONMENT'),
        'merchantId' => env('BRAINTREE_MERCHANT_ID'),
        'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
        'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
    ], 
    'afterpay' => [
        'merchantId' => env('AFTERPAY_MERCHANT_ID'),
        'secretKey' => env('AFTERPAY_SECRET_KEY'),
        'userAgent' => env('AFTERPAY_USER_AGENT'),
        'url' => env('AFTERPAY_URL'),
    ],
    'google' => [
        'recaptcha_key' => env('RECAPTCHA_KEY'),
        'recaptcha_secret' => env('RECAPTCHA_SECRET'),
        'tagmanager_account_id' => env('GTM_ACCOUNT', 'GTM-XXXX123'),
        'maps_api_key' => env('GOOGLE_MAP_API'),
    ],
    'aweber' => [
        'consumerkey' => env('AWEBER_CONSUMERKEY'),
        'consumersecret' => env('AWEBER_CONSUMERSECRET'),
        'accesskey' => env('AWEBER_ACCESSKEY'),
        'accesssecret' => env('AWEBER_ACCESSSECRET'),
        'listid' => env('AWEBER_LISTID'),
    ],

];
