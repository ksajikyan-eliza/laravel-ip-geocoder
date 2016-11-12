# Geocode Ip address with ease

This Laravel 5 package allows you to geocode an IP address, obtaining some useful information like latitude, longitude, country, zip code, etc.
Under the hood, the package performs API calls to freegeoip.net services.

## Getting Started

These instructions allows you to install the package into an existing Laravel app.

### Prerequisities

Laravel 5 up&running installation.


### Installation

You can install this package via Composer using:

```bash
composer require michelecurletta/laravel-ip-geocoder
```

You must also install this service provider.

```php
// config/app.php
'providers' => [
    ...
    MicheleCurletta\LaravelIpGeocoder\IpGeocoderServiceProvider::class,
    ...
];
```
IpGeocoder also comes with a facade, which provides an easy way to call the IpGeocoder, so you have to register it

```php
// config/app.php
'aliases' => array(
    ...
    'IpGeocoder' => MicheleCurletta\LaravelIpGeocoder\IpGeocoderFacade::class,
)
```

### Usage

Here's how you can use the IpGeocoder

```php
$ipGeocoder = new IpGeocoder;
$ipGeocoder->getLocationFromIp('93.44.202.59');

/* 
  This function returns an array with keys
  {  
   "ip":"93.44.202.59",
   "country_code":"IT",
   "country_name":"Italy",
   "region_code":"82",
   "region_name":"Sicily",
   "city":"Palermo",
   "zip_code":"90100",
   "time_zone":"Europe\/Rome",
   "latitude":38.1167,
   "longitude":13.3667,
   "metro_code":0
}
*/
```

If you prefer the Facade shourtcut, you can simply call  `getLocationFromIp`  on the facade, passing the ip parameter:

```php
IpGeocoder::getLocationFromIp('93.44.202.59');

/* 
  This function returns an array with keys
  {  
   "ip":"93.44.202.59",
   "country_code":"IT",
   "country_name":"Italy",
   "region_code":"82",
   "region_name":"Sicily",
   "city":"Palermo",
   "zip_code":"90100",
   "time_zone":"Europe\/Rome",
   "latitude":38.1167,
   "longitude":13.3667,
   "metro_code":0
}
*/
```
All done!

### Suggestion

Keep in mind that the geolocalization process performs external API calls: this fact can drastically slow down the performance of your app so, prefer to use the IpGeocoder into a background processing job or an async queue.
Enjoy.