<?php

use Illuminate\Http\Request;





//Area
Route::prefix('api')->middleware(['auth:api'])->group(function() {

	Route::post('/areas','AreaController@index');

});

Route::prefix('area')->middleware(['auth:api'])->group(function() {

	Route::post('/','AreaController@store');
	Route::put('/','AreaController@store');
	Route::delete('/{id}','AreaController@destroy');

});

//Topic
Route::prefix('api')->middleware(['auth:api'])->group(function() {

	Route::post('/topics','TopicController@index');

});

Route::prefix('topic')->middleware(['auth:api'])->group(function() {

	Route::post('/','TopicController@store');
	Route::put('/','TopicController@store');
	Route::delete('/{id}','TopicController@destroy');

});


//Category
Route::prefix('api')->middleware(['auth:api'])->group(function() {

	Route::post('/ncategorys','NcategoryController@index');

});

Route::prefix('ncategory')->middleware(['auth:api'])->group(function() {

	Route::post('/','NcategoryController@store');
	Route::put('/','NcategoryController@store');
	Route::delete('/{id}','NcategoryController@destroy');

});
