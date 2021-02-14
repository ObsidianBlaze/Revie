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
    Route::post('/register', 'api\v1\UserActivityController@register')->name('register');

//Logging in a user.
    Route::post('/login', 'api\v1\UserActivityController@login')->name('login');

//Reviewing.
    Route::post('/review', 'api\v1\UserActivityController@review')->middleware('auth:api');

});

//Apartment
Route::prefix('/apartment')->group(function () {

//Creating an address for the apartment..
    Route::post('/create', 'api\v1\ApartmentController@create');

});

//Review Type
//Creating an address for the apartment..
Route::post('/create', 'api\v1\ReviewTypeController@createReviewType');

//Reviews
Route::prefix('/review')->group(function () {

//Checking all reviews...
    Route::get('/all', 'api\v1\UserActivityController@getAllReview');
    //Getting a single review
    Route::get('/{id}', 'api\v1\UserActivityController@getSingleReview');
    //Marking a review helpful
    Route::post('/helpful/{id}', 'api\v1\UserActivityController@markHelpful');
    //Deleting a review
    Route::delete('/delete/{id}', 'api\v1\UserActivityController@deleteReview')->middleware('auth:api');
    //Updating a review
    Route::put('/update/{id}', 'api\v1\UserActivityController@updateReview')->middleware('auth:api');


});
