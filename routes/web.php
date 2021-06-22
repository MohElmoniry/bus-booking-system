<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureAdmin;
use app\models\User;
use App\Models\Cities;
use App\Models\Busses;
use App\Http\Controllers\TripController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $cities = Cities::all();
    $bus = Busses::first();
    return view('frontend/homepage',compact('cities','bus'));
});

//TripController
Route::get('/trip/all', [TripController::class, 'AllTrip'])->name('all.trips')->middleware(EnsureAdmin::class);
Route::post('/trip/add', [TripController::class, 'AddTrip'])->name('store.trips')->middleware(EnsureAdmin::class);
Route::get('trip/edit/{id}', [TripController::class, 'editTrip'])->middleware(EnsureAdmin::class);
Route::post('trip/update/{id}', [TripController::class, 'updateTrip'])->middleware(EnsureAdmin::class);
Route::get('trip/delete/{id}', [TripController::class, 'deleteTrip'])->middleware(EnsureAdmin::class);
//CitiesController
Route::get('/city/all', [CityController::class, 'AllCities'])->name('all.cities')->middleware(EnsureAdmin::class);
Route::post('/city/add', [CityController::class, 'AddCity'])->name('store.city')->middleware(EnsureAdmin::class);
Route::get('city/edit/{id}', [CityController::class, 'editCity'])->middleware(EnsureAdmin::class);
Route::post('city/update/{id}', [CityController::class, 'updateCity'])->middleware(EnsureAdmin::class);
Route::get('city/delete/{id}', [CityController::class , 'deleteCity'])->middleware(EnsureAdmin::class);
//BookController
Route::get('all', [BookController::class, 'searchTrips'])->name('search.trips');
Route::get('trip/edit/{id}', [BookController::class, 'bookTrip']);
Route::get('trip/', [BookController::class, 'searchMyTrips'])->name('findmytrips');

//UserController
Route::get('user/update/{id}', [UserController::class, 'updateUser'])->middleware(EnsureAdmin::class);





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $users = User::all();
    return view('dashboard',compact('users'));
})->name('dashboard')->middleware(EnsureAdmin::class);
