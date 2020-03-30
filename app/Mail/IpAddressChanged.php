<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IpAddressChanged extends Mailable
{
    use Queueable, SerializesModels;

    protected $old_ip_address, $new_ip_address;

	/**
	 * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('IP address has changed')
					->markdown('emails.ip-addresses.changed')
					->with([
						'old_ip_address' => $this->old_ip_address,
						'new_ip_address' => $this->new_ip_address
					]);
    }
}
