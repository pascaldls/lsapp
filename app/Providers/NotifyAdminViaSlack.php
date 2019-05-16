<?php

namespace App\Providers;

use App\Events\NewCustomerHasRegistedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdminViaSlack implements ShouldQueue
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
     * @param  NewCustomerHasRegistedEvent  $event
     * @return void
     */
    public function handle(NewCustomerHasRegistedEvent $event)
    {
        sleep(10);
        //
        // slack notification to admin
        dump(' Slack Message Here');
    }
}
