<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use DB;
use Illuminate\Support\Facades\Mail;

class transfer_tables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'brooks:transfer-product-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy Product Table from one Db to another';

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
        $msg = 'Laravel mail set to run from cron at every 5 minutes of 5PM(17hrs)| ran at - '.date('Y-m-d H:i:s');
        Mail::raw($msg, function ($message) {
                    $message->to('purvi.cshah@gmail.com');
                    $message->from('sygtest@gmail.com');
                    $message->Subject('Laravel mail');
                 });
        exit;
        
        $curr_dt=date('Ymd_His');
        $prod_tables="p_products p_variants p_images p_tags groups";
        //$prod_tables="p_products p_variants";
        $sql_path="storage/data/products/".$curr_dt."_products.sql";
        $cmd="mysqldump -u".env("LIVE_DB_USERNAME")."  -p".env("LIVE_DB_PASSWORD")." ".env("LIVE_DB_DATABASE")." ".$prod_tables." > ".$sql_path ;        
        $process = new Process($cmd);
        try {
            $process->mustRun();
            $this->info('MysqlDump is created successfully.');
        } catch (ProcessFailedException $exception) {
            $this->error('The MysqlDump process has been failed.');
            print_r($exception);
        }
        
    
        $import_cmd="mysql -u".env("FUTURE_DB_USERNAME")."  -p".env("FUTURE_DB_PASSWORD")." ".env("FUTURE_DB_DATABASE")." < ".$sql_path;        
        $import_process = new Process($import_cmd);
        try {
            $import_process->mustRun();
            $this->info('Mysql import is done successfully.');
        } catch (ProcessFailedException $exception) {
            $this->error('The Mysql import has failed.');
            print_r($exception);
        }
        
        DB::connection('future')->table("p_variants")->update(['visible' => 'No','reason_no'=>'Initial Setup']);
        DB::connection('future')->table("p_variants")->where('release_date','>',Date('Y-m-d'))->update(['visible' => 'Yes','reason_no'=>'']);
        
    }
}
