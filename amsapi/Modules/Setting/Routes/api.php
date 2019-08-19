<?php

use Illuminate\Http\Request;





Route::prefix('setting')->group(function() {
    Route::get('/', 'SettingController@index');
});

//Area
Route::prefix('api')->middleware(['auth:api'])->group(function() {

	Route::post('/areas','AreaController@index');

});

Route::prefix('area')->middleware(['auth:api'])->group(function() {

	Route::post('/','AreaController@store');
	Route::put('/','AreaController@store');
	Route::delete('/{id}','AreaController@destroy');

});
