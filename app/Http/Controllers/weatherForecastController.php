<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavedActivity;
use App\Models\ArchivedActivity;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Log;

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

    public function saveActivity()
    {
        try {
            SavedActivity::create([
                'user_id' => auth()->id(),
                'activity' => request('activity'),
                'description' => request('description'),
            ]);
            $archivedActivity = ArchivedActivity::where('user_id', auth()->id())->where('activity', request('activity'))->first();
            if ($archivedActivity) {
                $archivedActivity->delete();
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Activity not saved!']);
        }
        

        return response()->json(['message' => 'Activity saved!']);
    }

    public function archieveActivity() {
        try {
            $activity = SavedActivity::where('user_id', auth()->id())->where('activity', request('activity'))->first();
            ArchivedActivity::create([
                'user_id' => auth()->id(),
                'activity' => $activity->activity,
                'description' => $activity->description,
            ]);
            $activity->delete();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Activity not found!']);
        }
    }

    
    public function getSavedActivities()
    {
        try {
            $activities = SavedActivity::where('user_id', auth()->id())->get();
    
            return response()->json($activities);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Activities not found!']);
        }
    }

    public function getArchievedActivities()
    {
        try {
            $activities = ArchivedActivity::where('user_id', auth()->id())->get();
    
            return response()->json($activities);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Activities not found!']);
        }
    }

}