<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\iContactSubscriberInterface;
use App\Models\Icontact_pushmail;
use DB;

class icontactqueuepush extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'icontact-queue-push';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Push queued records to iContact';

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
    public function handle() {
        $pushmail_users = Icontact_pushmail::where('status', 'queue')->orderBy('pushmail_id', 'asc')->limit(100)->get();
        foreach ($pushmail_users as $user) {
            $email = $user->email;
            // $userid = $user->id;
            echo "<br>" . $email;

            $person_arr = array('fname' => $user->fname, 'lname' => $user->lname, 'email' => trim($user->email),
                'contest_code' => $user->comp_name, 'ad_tracking' => $user->source, 'gender' => $user->gender,
                'city' => $user->city, 'state' => $user->state,
                'birth_day' => $user->birth_day, 'birth_month' => $user->birth_month,
                'age' => $user->age_group, 'post_code' => $user->postcode,
                'phone' => $user->phone, 'shoe_wear' => $user->shoe_wear,
                'country' => $user->country, 'happy_runner_comp' => $user->happy_runner_comp,
                'training_for' => $user->training_for, 'likes_to_run' => $user->likes_to_run,
                'experience_preference' => $user->experience_preference,
            );
            $this->client->add_icontactpushmailSubscriber($person_arr);
        }
        echo "<br>" . "success";
    }

}
