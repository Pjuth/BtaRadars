<?php

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

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/radars/{radar}', 'RadarsController@show')->name('radars.show');

//Route::get('/{locale?}/radars', function ($locale) {
//    App::setLocale($locale);
//
//    //
//});

Route::get('/radars/showTrash', 'RadarsController@showTrash')->name('radars.showTrash');
Route::put('restore', 'RadarsController@restore')->name('radars.restore');
Route::DELETE('delete', 'RadarsController@hardDestroy')->name('radars.hardDestroy');
Route::resource('radars', 'RadarsController')->middleware('auth');

Route::resource('drivers', 'DriversController');

Route::get('/fuel_stations', 'FuelStationController@index')->name('fuel_stations.index');
Route::get('/fuel_station/{fuelStation}', 'FuelStationController@show')->name('fuel_stations.show');

Route::get('setlocale/{locale}', function ($locale) {
    Session::put('locale', $locale);

//    return redirect()->back();
    return App::getLocale();
})->middleware('locale');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

