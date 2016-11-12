<?php

namespace MicheleCurletta\LaravelIpGeocoder;

interface IpGeocoderInterface
{
    /**
     * Get the coordinates for a query.
     *
     * @param string $query
     *
     * @return array
     */
    const IP_LOCATION_NOT_FOUND = 'NOT_FOUND';

    public function getLocationFromIp($ip);
}
