<?php   

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CoordinatesAPI
{
    public function getCoordinates($cityQuery, $stateQuery)
    {
        $baseURL = 'https://api.geoapify.com/v1/geocode/search?';
        $apiKey = config('services.geocoding');
        
        $queryResponse = Http::get($baseURL . 'city=' . $cityQuery . '&state=' . $stateQuery . "&apiKey=" . $apiKey);
        $coordinates = json_decode($queryResponse);
        
        $lon = $coordinates->features[0]->properties->lon;
        $lat = $coordinates->features[0]->properties->lat;

        return [$lon, $lat];
    }
}
