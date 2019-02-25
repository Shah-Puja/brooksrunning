<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
        //$cmd="mysqldump uroot brooks_2018 shoe_mast > 20190215_shoe.sql";
        
        //$cmd="mysqldump -uftfjkzaeke  -pBBSdKev5ZJ ftfjkzaeke categories > 20190215_cat.sql";
        //$this->process = new Process($cmd);
        /*$this->process = new Process(sprintf(
            'mysqldump -u%s -p%s %s > %s',
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            config('database.connections.mysql.database'),
            storage_path('backups/backup.sql')
        
        ));*/
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        echo env('DB_DATABASE');
        $cmd="mysqldump -uftfjkzaeke  -pBBSdKev5ZJ ftfjkzaeke categories > 20190215_cat.sql";        
        //$process = new Process($cmd);
        
        try {
            //$process->mustRun();
            Process::mustRun($cmd);
            $this->info('The Transfer has been proceed successfully.');
        } catch (ProcessFailedException $exception) {
            $this->error('The Transfer process has been failed.');
            print_r($exception);
        }
    }
}
