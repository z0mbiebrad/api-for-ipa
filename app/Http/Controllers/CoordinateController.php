<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CoordinateController extends Controller
{
    public function __invoke($cityQuery, $stateQuery) {
        $queryResponse = Http::get('https://api.geoapify.com/v1/geocode/search?city=' . $cityQuery . '&state=' . $stateQuery . "&apiKey=" . Env('GEOCODING_API_KEY'));
        $coordinates = json_decode($queryResponse);

        $lon = $coordinates->features[0]->properties->lon;
        $lat = $coordinates->features[0]->properties->lat;

        return [$lon, $lat];
        
    }
}
