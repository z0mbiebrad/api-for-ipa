<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class WeatherController extends Controller
{
    protected $coordinateController;
    public function __construct(CoordinateController $coordinateController)
    {
        $this->coordinateController = $coordinateController;
    }
    public function __invoke($cityQuery, $stateQuery) {
        dd($this->coordinateController->__invoke($cityQuery, $stateQuery));
    }
}

