<?php

namespace App\Providers;

use App\Payments\Processor;
use App\Payments\AfterpayApiClient;
use App\Payments\AfterpayProcessor;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Braintree\Gateway as PaymentGateway;


class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */

    public function register() {
        
        $this->app->singleton(AfterpayProcessor::class, function () {
            $afterPayApiClient = new AfterpayApiClient([
                'Accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode(config('services.afterpay.merchantId') . ':' . config('services.afterpay.secretKey')),
                'Content-Type' => 'application/json',
                'User-Agent' => config('services.afterpay.userAgent')
                    ], config('services.afterpay.url'));
            return new AfterpayProcessor($afterPayApiClient);
        });

        $this->app->singleton(Processor::class, function () {
            $paymentgateway = new PaymentGateway([
                'environment' => config('services.braintree.environment'),
                'merchantId' => config('services.braintree.merchantId'),
                'publicKey' => config('services.braintree.publicKey'),
                'privateKey' => config('services.braintree.privateKey')
            ]);

            return new Processor($paymentgateway);
        });

        $this->app->bind('App\SYG\Bridges\BridgeInterface', function ($app) {
            $apiClient = new \GuzzleHttp\Client([
                'base_uri' => 'https://api.texaspeak.com.au:8525/RetailAPIFIT_LIVE/', 
                'headers' => ['Content-type' => 'text/xml', 'Accept' => 'Version_2.0'],
            ]);
            return new \App\SYG\Bridges\AP21Bridge($apiClient);
            // return new \App\SYG\Bridges\EntrezoBridge;
        });

    }

}
