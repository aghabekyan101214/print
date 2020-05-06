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

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get("/", "HomeController@index");
    Route::resource("business-services", "admin\BusinessServiceController");
    Route::resource("products", "admin\ProductController");
//    Route::resource("product-attributes", "admin\ProductAttributeController");
    Route::get("static-data", "admin\StaticDataController@index");
    Route::get("partners", "admin\StaticDataController@partners");
    Route::post("partners", "admin\StaticDataController@saveLogos");
    Route::get("forms/{product_id}", "admin\FormValueController@index");
    Route::post("forms/save-form-value", "admin\FormValueController@saveFormValue");
    Route::post("forms/edit-form-value", "admin\FormValueController@editFormValue");

    Route::post("static-data", "admin\StaticDataController@store");
    Route::delete("static-data/{id}", "admin\StaticDataController@destroy");
    Route::resource("reviews", "admin\ReviewController");
    Route::get("reviews/change-status/{id}", "admin\ReviewController@changeStatus");

    Route::resource("/contact", "admin\ReviewController@changeStatus");

    Route::resource("product-prices", "admin\FormValuePriceController");
    Route::post("product-prices/edit-price", "admin\FormValuePriceController@editPrice");
    Route::resource("home-banners", "admin\HomeBannerController");
});
Route::get('/services', 'client\ServiceController@index');
Route::get('/contact-us', 'client\ContactController@index');


