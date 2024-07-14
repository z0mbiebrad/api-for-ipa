<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\WeatherAPI;
use App\Services\CoordinatesAPI;


class BreweryController extends Controller
{
    public function index(Request $request)
    {
        $coordinatesAPI = new CoordinatesAPI();
        $weatherApi = new WeatherAPI();

        $cityQuery = $request->input('city_query');
        $stateQuery = $request->input('state_query');

        $coordinates = $coordinatesAPI->getCoordinates($cityQuery,$stateQuery);

        $lon = $coordinates[0];
        $lat = $coordinates[1];
        $weather = $weatherApi->getWeather($lon, $lat);

        $queryResponse = Http::get('https://api.openbrewerydb.org/v1/breweries?by_city=' . $cityQuery . '&by_state=' . $stateQuery);
        $breweriesArray = json_decode($queryResponse);

        return view('breweries.index', []);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Brewery $brewery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brewery $brewery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brewery $brewery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brewery $brewery)
    {
        //
    }
}
