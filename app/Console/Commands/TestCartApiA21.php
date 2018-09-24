<?php

namespace App\Console\Commands;


use Zttp\Zttp;
use League\Csv\Reader;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class TestCartApiA21 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'brooks:test-cart-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $xml = "<Cart>
            <PersonId>115414</PersonId>
            <Contacts></Contacts>
            <CartDetails>
                <CartDetail>
                    <SkuId>204532</SkuId>
                    <Quantity>1</Quantity>
                </CartDetail>	
            </CartDetails>
        </Cart>";

        $response = Zttp::withHeaders(['Content-type' => 'text/xml', 'Accept' => 'Version_2.0'])->put(
            "https://api.texaspeak.com.au:8525/RetailAPIFIT_LIVE/Carts/1234?countryCode=AUFIT", [
            'body' => $xml
        ]);

    }
}
