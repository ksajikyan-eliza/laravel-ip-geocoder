<?php

namespace MicheleCurletta\LaravelIpGeocoder;

use Illuminate\Support\Facades\Facade;

class IpGeocoderFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-ip-geocoder';
    }
}
