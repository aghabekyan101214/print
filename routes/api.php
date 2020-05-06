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
Route::group(["middleware" => "cors"], function(){
    Route::get('/get-main', 'api\HomeController@index');
    Route::get('/get-form/{slug}', 'api\FormController@index');
    Route::post('/get-price', 'api\FormController@getPrice');
    Route::get('/get-business-services', 'api\BusinessServiceController@index');
    Route::get('/business-service/{slug?}', 'api\BusinessServiceController@getBusinessService');
    Route::post('/leave-review', 'api\ReviewController@index');
    Route::resourse('/contact', 'api\ContactController');
    Route::get('/get-reviews', 'api\ReviewController@getReviews');
});
