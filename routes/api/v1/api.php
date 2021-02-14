<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Users
Route::prefix('/user')->group(function () {

//Registering a user.
    Route::post('/register', 'api\v1\UserActivityController@register');

//Logging in a user.
    Route::post('/login', 'api\v1\UserActivityController@login');

//Reviewing.
    Route::post('/review', 'api\v1\UserActivityController@review');

});

//Apartment
Route::prefix('/apartment')->group(function () {

//Creating an address for the apartment..
    Route::post('/create', 'api\v1\ApartmentController@create');

});

//Review Type
//Creating an address for the apartment..
Route::post('/create', 'api\v1\ReviewTypeController@createReviewType');
