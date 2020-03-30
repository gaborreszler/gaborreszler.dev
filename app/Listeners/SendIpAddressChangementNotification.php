<?php

namespace App\Listeners;

use App\Events\IpAddressChanged as IpAddressChangedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendIpAddressChangementNotification
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
     * @param  IpAddressChangedEvent  $event
     * @return void
     */
    public function handle(IpAddressChangedEvent $event)
    {
		Log::notice(
			sprintf(
				'IP address has been changed from %s to %s.',
				$event->old_ip_address, $event->new_ip_address
			)
		);
		//send e-mail
    }
}
