<?php

namespace App\Providers;

use App\Events\NewCustomerHasRegistedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdminViaSlack
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
        //
        // slack notification to admin
        dump(' Slack Message Here');
    }
}
