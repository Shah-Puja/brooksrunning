<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Mail;


class s8_SendStatusEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 's8_SendStatusEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Status Mail after refresh Process';

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
        //
        $msg = 'Mail sent from s8'.date('Y-m-d H:i:s');
        Mail::raw($msg, function ($message) {
                    $message->to('purvi.cshah@gmail.com');
                    $message->from('sygtest@gmail.com');
                    $message->Subject('Refresh Status');
                 });
    }
}
