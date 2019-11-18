<?php

namespace App\Providers;
use AWeberAPI;
use App\Payments\Processor;
use App\Payments\AfterpayApiClient;
use App\Payments\AfterpayProcessor;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Braintree\Gateway as PaymentGateway;
use Storage;
use League\Flysystem\Filesystem;
use League\Flysystem\Sftp\SftpAdapter;


class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Storage::extend('sftp', function ($app, $config) {
            return new Filesystem(new SftpAdapter($config));
        });
        
        //
        Schema::defaultStringLength(191);

        view()->composer('*', function($view){
            $view_name = str_replace('.', '-', $view->getName());
            view()->share('view_name', $view_name);
        });
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
                'base_uri' => env('AP21_URL'),  
                'headers' => ['Content-type' => 'text/xml', 'Accept' => 'Version_3.0'],
                'connect_timeout' => 10,
            ]);
            return new \App\SYG\Bridges\AP21Bridge($apiClient);
            // return new \App\SYG\Bridges\EntrezoBridge;
        });

        $this->app->bind('App\SYG\Subscribers\SubscriberInterface', function ($app) {
            $aweber = new AWeberAPI( config('services.aweber.consumerkey'), config('services.aweber.consumersecret') );
            return new \App\SYG\Subscribers\AweberSubscriber($aweber);
        });

        $this->app->bind('App\SYG\Subscribers\iContactSubscriberInterface', function ($app) {
            $client = \App\SYG\Subscribers\iContactProApi::getInstance();
            $client->setConfig(array(
                'appId' => config('services.icontact.appid'),
                'apiPassword' => config('services.icontact.apipassword'),
                'apiUsername' => config('services.icontact.apiusername'),
                'companyId' => config('services.icontact.companyid'),
                'profileId' => config('services.icontact.profileid')
            ));
            return new \App\SYG\Subscribers\iContactSubscriber($client);
        });
        
        /*$this->app->bind('App\SYG\Subscribers\SubscriberInterface', function ($app) {
            $client = \App\SYG\Subscribers\iContactProApi::getInstance();
            $client->setConfig(array(
                'appId' => config('services.icontact.appid'),
                'apiPassword' => config('services.icontact.apipassword'),
                'apiUsername' => config('services.icontact.apiusername'),
                'companyId' => config('services.icontact.companyid'),
                'profileId' => config('services.icontact.profileid')
            ));
            return new \App\SYG\Subscribers\iContactSubscriber($client);
        });*/


    }

}
