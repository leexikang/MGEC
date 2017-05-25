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

Route::get('/', function () {
    return view('rollCall/rollCall');
});
Route::get('/token', 'RollCallController@token');
Route::post('/generateToken', 'RollCallController@generateToken');

Route::get('/api', function(){
        return json_encode(["hello" => "world"]);
    });

Route::get('/select/trip', 'RollCallController@selectTrip');
Route::get('/trip/{id}/rollcall', 'RollCallController@createRollCall');


Route::group(['prefix' => 'api'], function () {
    Route::put('attendances/{name}/present', 'RollCallController@present');
    Route::get('attendances/{name}/suggest', 'RollCallController@suggestUsers');
    Route::get('trips/active', 'RollCallController@activeTrips');
    Route::post('rollcalls', 'RollCallController@store');

});