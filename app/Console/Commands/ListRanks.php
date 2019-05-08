<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\GroupRanks;

class ListRanks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Ranks:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Ranks in group_ranks table';

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
       $groups=GroupRanks::distinct()->select('group_id')->get()->toArray(); 
       foreach($groups as $curr_group):
            echo "\n". $curr_group['group_id'];
            //select * from group_ranks where group_id='$curr_group_id' order by rank desc
            $group_items=GroupRanks::where('group_id',$curr_group['group_id'])->orderBy('display_rank','desc')->get();
            $cnt=1;
            foreach($group_items as $curr_item):
                GroupRanks::where('id',$curr_item->id)->update(['display_rank'=>$cnt]);
                $cnt++;
            endforeach;
       endforeach;
    }
}
