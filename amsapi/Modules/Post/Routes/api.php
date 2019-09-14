<?php

use Illuminate\Http\Request;
use Modules\Post\Entities\PostTag;
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

Route::prefix('api')->group(function() {

	Route::post('/posts','BranchController@index');

});

Route::prefix('post')->middleware('auth:api')->group(function(){
    Route::get('/list','PostController@index');
    Route::post('/','PostController@create');
});
Route::prefix('tag')->middleware('auth:api')->group(function(){
    Route::get('/list',function(){
        return PostTag::all();
    });

});
Route::middleware('auth:api')->get('/post', function (Request $request) {
    return $request->user();
});
