<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Models\Product;

class AlgoliaSync extends Command {
    protected $client;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'algolia:sync';

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
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {        
        $this->call('scout:reimport');
        //$this->call('scout:flush', ['model' => 'App\Models\Product']);
        //$this->call('scout:import', ['model' => 'App\Models\Product']);
        $this->info('scout:reimport Command ran successfully!');        
        die;
    }
}
