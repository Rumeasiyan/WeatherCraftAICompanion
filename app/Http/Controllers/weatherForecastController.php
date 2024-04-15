<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class weatherForecastController extends Controller
{
    public function index()
    {
        $weatherApiKey = config('services.weather_api_key.key');
        $weatherCityKey = config('services.weather_api_key.city');
        $googleAPIKey = config('services.google_gemini.key');

        $apikeys = [
            'weatherApiKey' => $weatherApiKey,
            'weatherCityKey' => $weatherCityKey,
            'googleAPIKey' => $googleAPIKey,
        ];
        
        return view('WeatherForecast', compact('apikeys'));
    }
}