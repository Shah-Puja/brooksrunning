<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use DB;
use Illuminate\Support\Facades\Mail;

class s7_transfer_tables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 's7_transfer_product_tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy Product Table from Live Db to Staging and Future';

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
                
        
        $curr_dt=date('Ymd_His');
        $prod_tables="p_products p_variants p_images p_tags groups";        
        $sql_path="storage/data/products/".$curr_dt."_products.sql";
        $cmd="mysqldump -u".env("LIVE_DB_USERNAME")."  -p".env("LIVE_DB_PASSWORD")." ".env("LIVE_DB_DATABASE")." ".$prod_tables." > ".$sql_path ;        
        $this->run_process($cmd,'dump');


        $import_staging_cmd="mysql -u".env("STAGING_DB_USERNAME")."  -p".env("STAGING_DB_PASSWORD")." ".env("STAGING_DB_DATABASE")." < ".$sql_path;        
        $this->run_process($import_staging_cmd,'Staging'); 
                
    
        $import_future_cmd="mysql -u".env("FUTURE_DB_USERNAME")."  -p".env("FUTURE_DB_PASSWORD")." ".env("FUTURE_DB_DATABASE")." < ".$sql_path;        
        $this->run_process($import_future_cmd,'Future');        
        
        DB::connection('future')->table("p_variants")->update(['visible' => 'No','reason_no'=>'Initial Setup']);
        DB::connection('future')->table("p_variants")->where('release_date','>',Date('Y-m-d'))->update(['visible' => 'Yes','reason_no'=>'']);

        $msg = 'Mail set to run from cron at 9:55PM(21:55hrs)| ran at - '.date('Y-m-d H:i:s');
        Mail::raw($msg, function ($message) {
                    $message->to('purvi.cshah@gmail.com');
                    $message->from('sygtest@gmail.com');
                    $message->Subject('Laravel mail');
                 });
        
    }

    public function run_process($cmd,$cmd_name)
    {   
        $process = new Process($cmd);
        try {
            $process->mustRun();
            $this->info($cmd_name.' Process got executed successfully.');
        } catch (ProcessFailedException $exception) {
            $this->error($cmd_name.' Process failed.');
            print_r($exception);
        }
    }
}
