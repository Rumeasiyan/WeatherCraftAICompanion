<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\weatherForecastController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/WeatherForecast', function () {
//     return view('WeatherForecast');
// })->middleware(['auth', 'verified'])->name('WeatherForecast');

Route::get('/WeatherForecast', [weatherForecastController::class, 'index'])->middleware(['auth', 'verified'])->name('WeatherForecast');

Route::get('/test', function () {
    return "Hello World";
})->middleware(['auth', 'verified'])->name('test');
// Route::redirect('/dashboard', route('/WeatherForecast'));

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';