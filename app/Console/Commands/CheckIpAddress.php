<?php

namespace App\Console\Commands;

use App\IpAddress;
use Illuminate\Console\Command;

class CheckIpAddress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ip-address:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks IP address and updates it upon change on Cloudflare.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		$ip_address_checker_sites = [
			'https://api.ipify.org',
			'https://ipinfo.io/ip'
		];

		$ip_address = null;
		$i = 0;
		while (!$ip_address && $i < count($ip_address_checker_sites)) {
			$content = file_get_contents($ip_address_checker_sites[$i++]);

			if (
				!empty($possible_ip_address = trim($content, ' '))
				&&
				preg_match('/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/', $possible_ip_address)
			)
				$ip_address = $possible_ip_address;
		}

		if (($current_ip_address = IpAddress::current()->value) !== $ip_address) {
			//dispatch event

			//create request

			//store the new IP address based on the request
		}

		exit;
    }
}
