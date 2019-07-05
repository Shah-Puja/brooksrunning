<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;


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
        $new_table_arr = array("new_p_products", "new_p_variants", "new_p_tags","new_groups","new_p_images");
        $new_table_exist='No';
        foreach ($table_arr as $table) {
            if (Schema::hasTable($table)) {
                $new_table_exist='Yes';
                break;
            }
        }
        $data['new_tables_exist']= $new_table_exist;

        
        $data['visible_sku']= DB::connection('production')->table("p_variants")->where('visible','Yes')->count();
        $data['not_visible_sku']= DB::connection('production')->table("p_variants")->where('visible','No')->count();
        $data['products']= DB::connection('production')->table("p_products")->count();
        $data['variants']= DB::connection('production')->table("p_variants")->count();
        $data['tags']= DB::connection('production')->table("p_tags")->count();
        $data['images']= DB::connection('production')->table("p_images")->count();
        $data['groups']= DB::connection('production')->table("groups")->count();
        $data['ap21_notes']= DB::connection('production')->table("ap21_notes")->count();
        $data['ap21_notes_distinct']= DB::connection('production')->table("ap21_notes_distinct")->count();
        $data['ap21_processed_idx']= DB::connection('production')->table("ap21_notes_distinct")->where('processed','Yes')->count();
        $data['ap21_unprocessed_idx']= DB::connection('production')->table("ap21_notes_distinct")->where('processed','No')->count();

        $data['future_visible_sku']= DB::connection('future')->table("p_variants")->where('visible','Yes')->count();
        $data['future_not_visible_sku']= DB::connection('future')->table("p_variants")->where('visible','No')->count();

        

        Mail::send('emails.DailyRefresh', $data, function ($message) { 
            $message->to('purvi.cshah@gmail.com');
            $message->from('sygtest@gmail.com');
            $message->Subject('Refresh Status 5-July-2019');
        });        
    }
}
