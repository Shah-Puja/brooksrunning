<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\SubscriberInterface;
use App\Models\User;

class UsersIcontact extends Command {
    protected $client;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:icontact';

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
    public function __construct(SubscriberInterface $client) {
        parent::__construct();
        $this->client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        DB::table('items')->insert(['name' => 'Hello Test']);
        $this->info('Demo:Cron Command Run successfully!');
        $users = User::where('icontact_subscribed', NULL)->orWhere('icontact_subscribed', '')->orderBy('id', 'desc')->limit(25)->get();
        foreach ($users as $user) {
            $email = $user->email;
            echo "<br>".$email;
            $user->first_name = ($user->first_name) ? $user->first_name : "";
            $user->last_name = ($user->last_name) ? $user->last_name : "";
            $name = $user->first_name . " " . $user->last_name;
            $arr = array('name' => $name, 'email' => trim($email));
            $response = $this->client->updateoradd_Subscriber($arr, null, null, null, null, null, null, null, null, null, null, null, null, null);
            
        }
		echo "<br>"."25 Users inserted in iContact";
    }
}
