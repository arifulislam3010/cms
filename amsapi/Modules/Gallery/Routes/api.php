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

//Gallery
Route::prefix('api')->middleware(['auth:api'])->group(function() {

	Route::post('/gallerys','GalleryController@index');

});

Route::prefix('gallery')->middleware(['auth:api'])->group(function() {

	Route::post('/','GalleryController@store');
	Route::put('/','GalleryController@store');
	Route::delete('/{id}','GalleryController@destroy');

});

//Gallery Content

Route::prefix('api')->middleware(['auth:api'])->group(function() {

	Route::post('/gcontents','GalleryContentController@index');

});

Route::prefix('gcontent')->middleware(['auth:api'])->group(function() {

	Route::post('/','GalleryContentController@store');
	Route::put('/','GalleryContentController@store');
	Route::delete('/{id}','GalleryContentController@destroy');

});
