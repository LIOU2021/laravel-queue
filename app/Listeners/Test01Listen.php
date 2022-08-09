<?php

namespace App\Listeners;

use App\Events\TestEvent;
use App\Models\Test;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class Test01Listen implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(TestEvent $event)
    {
        sleep(5);
        $test = Test::create([
            "name"=>$event->data."_test01"
        ]);
        Log::debug("queue : ",$test->toArray());
    }
}
