<?php

use Illuminate\Http\Request;





Route::prefix('setting')->group(function() {
    Route::get('/', 'SettingController@index');
});

// tags 
Route::prefix('api/tag')->middleware('auth:api')->group(function(){
	Route::get('/list','TagController@index');
});
Route::prefix('api/topic')->middleware('auth:api')->group(function(){
	Route::get('/list','TopicController@index');
});
//Area
Route::prefix('api')->group(function() {

	Route::post('/areas','AreaController@index');

});
// category
Route::prefix('api/category')->middleware('auth:api')->group(function(){
	Route::get('/list','CategoryController@index');
	Route::post('/','CategoryController@create');
	Route::put('/{id}','CategoryController@update');
	Route::delete('/{id}','CategoryController@destroy');
});
//area
Route::prefix('api/area')->middleware(['auth:api'])->group(function() {
	Route::get('/list','AreaController@index');
	Route::post('/','AreaController@create');
	Route::put('/{id}','AreaController@update');
	Route::delete('/{id}','AreaController@destroy');

});

//Topic
Route::prefix('api/topic')->middleware(['auth:api'])->group(function() {

	Route::get('/list','TopicController@index');
	Route::post('/','TopicController@store');
	Route::put('/{id}','TopicController@store');
	Route::delete('/{id}','TopicController@destroy');

});

// Route::prefix('topic')->middleware(['auth:api'])->group(function() {

// 	Route::post('/','TopicController@store');
// 	Route::put('/','TopicController@store');
// 	Route::delete('/{id}','TopicController@destroy');

// });


//Category
Route::prefix('api')->middleware(['auth:api'])->group(function() {

	Route::post('/ncategorys','NcategoryController@index');

});

Route::prefix('ncategory')->middleware(['auth:api'])->group(function() {

	Route::post('/','NcategoryController@store');
	Route::put('/','NcategoryController@store');
	Route::delete('/{id}','NcategoryController@destroy');

});
