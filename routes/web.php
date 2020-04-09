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
    Route::get("forms/{product_id}", "admin\FormValueController@index");
    Route::post("forms/save-form-value", "admin\FormValueController@saveFormValue");
    Route::post("forms/edit-form-value", "admin\FormValueController@editFormValue");
    Route::post("static-data", "admin\StaticDataController@store");
});
Route::get('/services', 'client\ServiceController@index');
Route::get('/contact-us', 'client\ContactController@index');


