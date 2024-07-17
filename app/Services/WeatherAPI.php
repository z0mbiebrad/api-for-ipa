<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WeatherAPI
{
    public function getWeather($cityQuery, $stateQuery)
    {
        $coordinatesAPI = new CoordinatesAPI();
        $coordinates = $coordinatesAPI->getCoordinates($cityQuery,$stateQuery);
        $time = LARAVEL_START;
        dd(date('H:i A', (int) $time));

        $lat = $coordinates[0];
        $lon = $coordinates[1];

        $baseUrl = 'https://api.openweathermap.org/data/3.0/onecall?';
        $apiKey = config('services.openweather');
        $units = 'imperial';
        
        $queryResponse = Http::get($baseUrl . 'lat=' . $lat . '&lon=' . $lon . '&units=' . $units . '&appid=' . $apiKey);
        $weather = json_decode($queryResponse);
        
        
        return $weather->hourly;
    }
}
