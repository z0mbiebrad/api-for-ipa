<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BreweryController extends Controller
{
    protected $weatherController;

    public function __construct(WeatherController $weatherController)
    {
        $this->weatherController = $weatherController;
    }
    public function index(Request $request)
    {
        $cityQuery = $request->input('city_query');
        $stateQuery = $request->input('state_query');
        $queryResponse = Http::get('https://api.openbrewerydb.org/v1/breweries?by_city=' . $cityQuery . '&by_state=' . $stateQuery);
        $breweriesArray = json_decode($queryResponse);
        $this->weatherController->__invoke($cityQuery, $stateQuery);
        dd($breweriesArray);

        return view('breweries.index');
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
