<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

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
        DB::insert('Insert ignore into group_ranks(group_id,style,stylename,display_rank) 
        select distinct group_id,b.style,b.stylename,0 from groups a,p_products b
        where a.product_id=b.id order by group_id');

        DB::update('update group_ranks set display_rank=id where display_rank=0');

    }
}
