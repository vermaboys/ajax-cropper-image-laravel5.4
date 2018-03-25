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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* start Image crop*/
Route::get('image','ImageCropperController@getImage');
Route::any('get-ajax-image-popup', 'ImageCropperController@get_ajax_image_popup');
Route::post('image-crop', 'ImageCropperController@imageCropPost');
