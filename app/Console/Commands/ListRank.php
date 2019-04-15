<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Group_ranks;

class ListRank extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Group:Ranks';

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
        $a = Group_ranks::distinct()->get(['group_id']);
        print_r($a);
    }
}
