<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use App\Services\WeatherAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;


class BreweryController extends Controller
{
    public function index(Request $request)
    {
        $cityQuery = $request->input('city_query');
        $stateQuery = $request->input('state_query');

        $queryResponse = Http::get('https://api.openbrewerydb.org/v1/breweries?by_city=' . $cityQuery . '&by_state=' . $stateQuery);
        $breweries = json_decode($queryResponse);

        if ($breweries) {
            foreach ($breweries as $brewery) {
                Brewery::updateOrCreate([
                    'brew_id' => $brewery->id,
                    'name' => $brewery->name,
                    'city' => $brewery->city,
                    'country' => $brewery->country,
                    'phone' => $brewery->phone,
                    'website_url' => $brewery->website_url,
                    'state' => $brewery->state,
                    'street' => $brewery->street,
                ]);
            }
        } else {
            return redirect()->route('welcome')->with('message', 'No breweries were found in this area, doesnt mean they dont exist! Just not in the database yet. Thanks!');
        }

        return view('breweries.index', ['breweries' => $breweries]);
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
