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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('logs')->group(function () {
    Route::post('/',  'LogController@post');
});

Route::prefix('heat-map')->group(function () {
    Route::post('/link-hits',  'HeatMapController@linkHits');
    Route::post('/page-type-hits',  'HeatMapController@pageTypeHits');
    Route::post('/customer-journey',  'HeatMapController@customerJourney');
    Route::post('/customer-with-same-journey',  'HeatMapController@customersWitsSameJourney');
});