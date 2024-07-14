<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherAPI
{
    public function getWeather($lat, $lon)
    {
        $baseUrl = 'https://api.openweathermap.org/data/3.0/onecall?';
        $apiKey = config('services.openweather');

        $queryResponse = Http::get($baseUrl . 'lat=' . $lat . '&lon=' . $lon . '&appid=' . $apiKey);
        $weather = json_decode($queryResponse);
        
        return $weather;
    }
}
