<?php

namespace App\Listeners;

use App\Events\IpAddressChanged as IpAddressChangedEvent;
use App\Mail\IpAddressChanged as IpAddressChangedMail;
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

		Mail::to([[
			"email"	=> config('app.owner.mail'),
			"name"	=> config('app.owner.name')
		]])->send(new IpAddressChangedMail($event->old_ip_address, $event->new_ip_address));
    }
}
