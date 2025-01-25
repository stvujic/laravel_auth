<?php

use App\Http\Controllers\AdminForecastsController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ForecastsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCities;
use App\Http\Controllers\WeatherController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return "Hello World";
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


//Route::view('/', 'welcome');
Route::get("/", function () {
    $userFavourites =[];

    $user = Auth::user();
    if($user !== null)
    {
        $userFavourites = \App\Models\UserCities::where([
            'user_id' => $user ->id
        ])->get();
    }
    return view('welcome', compact('userFavourites')    );
});



Route::get("/prognoza", [WeatherController::class, "index"]);

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::view('/add-city', 'add-cities');
    Route::post('/send-city', [CityController::class, 'sendCity']);
    Route::get('/cities', [CityController::class, 'showCities']);
    Route::get('/cities/{id}/delete', [CityController::class, 'deleteCity']);
    Route::get('/cities/{id}/edit', [CityController::class, 'singleCity']);
    Route::post('/cities/{id}/save', [CityController::class, 'saveCity']);
});

Route::get("/forecast/search", [ForecastsController::class, "search"])->name("forecast.search");
Route::get("/forecast/{city:name}", [ForecastController::class, "index"])->name("forecast.permalink");

Route::get("/user-cities/favourite/{city}", [UserCities::class, "favourite"])->name("city.favourite");
Route::get("/user-cities/unfavourite/{city}", [UserCities::class, "unfavourite"])->name("city.unfavourite");

Route::prefix("/admin")->middleware(AdminCheckMiddleware::class)->group(function () {
    Route::view('/weather', 'admin.weather_index');
    Route::post('/weather/update', [AdminWeatherController::class, 'update'])->name("weather.update");
    Route::view("/forecasts", "admin.forecasts_index");
    Route::post("/forecasts/create", [AdminForecastsController::class, "create"])->name("forecasts.create");
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
