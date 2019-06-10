<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\iContactSubscriberInterface;
use App\Models\User;
use DB;


class icontactpush extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'icontact-push';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Push Users to iContact';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    
    protected $client;

    public function __construct(iContactSubscriberInterface $client) {
        parent::__construct();
        $this->client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $users = User::where('icontact_id', NULL)->orWhere('icontact_id', '0')->orderBy('id', 'desc')->limit(10)->get();
        foreach ($users as $user) {
            $email = $user->email;
            $userid = $user->id;
            echo "<br>" . $email;

            $person_arr = array('name' => $user->first_name . " " . $user->last_name, 'email' => trim($user->email), 'gender' => $user->gender, 'birth_day' => $user->birth_date,
                'birth_month' => $user->birth_month, 'age' => $user->age_group, 'post_code' => $user->postcode, 'country' => $user->state,
                'shoe_wear' => $user->shoe_wear, 'happy_runner_comp' => $user->contest_code, 'ad_tracking' => $user->source);
            $this->client->add_icontactSubscriber($person_arr,$userid);
        }
        echo "<br>" . "1000 Users inserted in iContact";
    }
}
