<?php

namespace App\Http\Controllers;

use App\Domain;
use App\IpAddress;
use Cloudflare\API\Adapter\Guzzle;
use Cloudflare\API\Auth\APIKey;
use Cloudflare\API\Endpoints\EndpointException;
use Cloudflare\API\Endpoints\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IpAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store(Request $request)
    {
    	$oldIpAddress = IpAddress::current();
    	$oldIpAddress->is_current = false;
    	$oldIpAddress->update();

		$ipAddress = new IpAddress();
		$ipAddress->value = $request->input('ip_address');
		$ipAddress->save();


    	$key        = new APIKey(config('app.cloudflare.email'), config('app.cloudflare.api.key'));
		$adapter    = new Guzzle($key);
		$zones      = new Zones($adapter);

		$domains = Domain::all()->pluck('value');

		foreach ($domains as $domain) {
			try {
				$zoneID = $zones->getZoneID($domain);
			} catch (EndpointException $e) {
				Log::error('There was some error while trying to get Cloudflare ZoneID.');
			}

			/** @var \Cloudflare\API\Endpoints\DNS $dns */
			$dns = new \Cloudflare\API\Endpoints\DNS($adapter);

			$record = $dns->listRecords($zoneID, "A", $domain)->result[0];

			$dns->updateRecordDetails($zoneID, $record->id, [
				"type" => "A",
				"name" => $domain,
				"content" => $ipAddress->value
			]);

			if ($record->content === $ipAddress->value)
				Log::info(
					sprintf(
						'The new IP address (%s) has been assigned to domain (%s) on Cloudflare.',
						$ipAddress->value, $domain
					)
				);
			else
				Log::alert(
					sprintf(
						'The new IP address (%s) does not match the one (%s) that is assigned to domain (%s) on Cloudflare.',
						$ipAddress->value, $record->content, $domain
					)
				);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
