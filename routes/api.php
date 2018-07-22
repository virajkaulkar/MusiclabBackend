<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|------------------------------------------------------------------
|Auth Routes
|------------------------------------------------------------------
 */
//Route::post('register', 'AuthController@register');
//Route::post('login', 'AuthController@login');
//Route::group(['middleware' => ['jwt.auth']], function() {
//    Route::get('logout', 'AuthController@logout');
//    Route::get('test', function(){
//        return response()->json(['foo'=>'bar']);
//    });
//});

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

//Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');

//});
Route::post('logout','API\UserController@logoutApi');
/*
|------------------------------------------------------------------
|Tracks Routes
|------------------------------------------------------------------
 */
//Route::group(['middleware' => ['jwt.auth']], function() {

Route::group(['middleware' => 'auth:api'], function(){
//List Tracks
Route::get('tracks', 'TracksController@index');

//List Single Track
Route::get('track/{id}', 'TracksController@show');

//List Track by name
Route::get('track/{name?}', 'TracksController@getTrackByName');

//Create New Track
Route::post('track', 'TracksController@store');

//Update Track
Route::put('track', 'TracksController@store');

//Delete Track
Route::delete('track/{id}', 'TracksController@destroy');

/*
|------------------------------------------------------------------
|Genres Routes
|------------------------------------------------------------------
 */

//List Tracks
Route::get('genres', 'GenresController@index');

//List Single Track
Route::get('genre/{id}', 'GenresController@show');

//Create New Track
Route::post('genre', 'GenresController@store');

//Update Track
Route::put('genre', 'GenresController@store');

//Delete Track
Route::delete('genre/{id}', 'GenresController@destroy');


Route::post('details', 'API\UserController@details');
});
