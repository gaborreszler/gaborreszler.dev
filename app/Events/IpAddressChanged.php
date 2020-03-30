<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class IpAddressChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $old_ip_address, $new_ip_address;

	/**
	 * Create a new event instance.
	 *
	 * @param $old_ip_address
	 * @param $new_ip_address
	 */
    public function __construct($old_ip_address, $new_ip_address)
    {
        $this->old_ip_address = $old_ip_address;
        $this->new_ip_address = $new_ip_address;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
