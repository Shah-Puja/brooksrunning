<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\SYG\Subscribers\SubscriberInterface;
use Illuminate\Support\Facades\Log;

class ProcessCompetition implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $subscriber;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subscriber)
    {
        $this->subscriber = $subscriber;
    }
 
    public function handle(SubscriberInterface $client)
    {
        //Log::info($client);
        //$client->updateoradd_Subscriber($this->subscriber);
    }
}
