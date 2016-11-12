<?php

namespace MicheleCurletta\LaravelIpGeocoder;

use Exception;
use GuzzleHttp\Client;
use MicheleCurletta\LaravelIpGeocoder\IpGeocoder;
use GuzzleHttp\Exception\ClientException;

class IpGeocoder implements IpGeocoderInterface
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $endpoint = 'https://freegeoip.net';

    /**
     * @param \GuzzleHttp\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get the coordinates for a query.
     *
     * @param string $ip
     *
     * @param null $format
     * 
     * @return array
     *
     * @throws \Exception
     */
    public function getLocationFromIp($ip)
    {
        if ($ip == '') {
            return false;
        }

        $request = $this->client->createRequest('GET', $this->endpoint);

        $request->setPath('json/'.$ip);

        try{
            $response = $this->client->send($request); 

            if ($response->getStatusCode() != 200) {
                return array('error' => self::RESULT_NOT_FOUND);
            }   
        }
        catch(ClientException $ex){
            return array('error' => self::IP_LOCATION_NOT_FOUND);
        }

        return $response->json();
    }

}
