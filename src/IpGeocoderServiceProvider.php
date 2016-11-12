<?php

namespace MicheleCurletta\LaravelIpGeocoder;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class IpGeocoderServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind('laravel-ip-geocoder', function ($app) {
            return (new IpGeocoder(new Client));
        });
    }
}
