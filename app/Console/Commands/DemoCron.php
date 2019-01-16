<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\SubscriberInterface;
use App\Models\User;

class DemoCron extends Command {
    protected $client;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

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
        /*DB::table('items')->insert(['name' => 'Hello World']);
        $this->info('Demo:Cron Command Run successfully!');*/
        $users = User::where('icontact_subscribed', NULL)->orWhere('icontact_subscribed', '')->orderBy('id', 'desc')->limit(20)->get();
        foreach ($users as $user) {
            $email = $user->email;
            $name = $user->first_name . " " . $user->last_name;
            echo $email."<br>";
            $arr = array('name' => $name, 'email' => $email);
            $response = $this->client->updateoradd_Subscriber($arr, null, null, null, null, null, null, null, null, null, null, null, null, null);
        }
        echo "20 Users inserted in iContact";
    }

}
