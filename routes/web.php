<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\weatherForecastController;
use Illuminate\Support\Facades\Route;

Route::get('/', [weatherForecastController::class, 'index'])->middleware(['auth', 'verified'])->name('WeatherForecast');

// Route::get('/WeatherForecast', function () {
//     return view('WeatherForecast');
// })->middleware(['auth', 'verified'])->name('WeatherForecast');

Route::get('/WeatherForecast', [weatherForecastController::class, 'index'])->middleware(['auth', 'verified'])->name('WeatherForecast');

Route::get('/test', function () {
    return "Hello World";
})->middleware(['auth', 'verified'])->name('test');

Route::post('/save/activity', [weatherForecastController::class, 'saveActivity'])->middleware(['auth', 'verified'])->name('save.activity');

Route::get('/get/saved/activities', [weatherForecastController::class, 'getSavedActivities'])->middleware(['auth', 'verified'])->name('get.saved.activities');

Route::post('/archieve/activity', [weatherForecastController::class, 'archieveActivity'])->middleware(['auth', 'verified'])->name('archieve.activity');

Route::get('/get/archieved/activities', [weatherForecastController::class, 'getArchievedActivities'])->middleware(['auth', 'verified'])->name('get.archieved.activities');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
