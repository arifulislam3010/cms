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

//Route::middleware('auth:api')->get('/frontend', function (Request $request) {
//    return $request->user();
//});

Route::prefix('frontend')->group(function () {
    Route::post('/posts', 'PostsController@index');
    Route::get('/post/{id}', 'PostsController@details');
    Route::get('/area/{title}', 'PostsController@area');
    Route::get('/categories', 'PostsController@category');
    Route::post('/categories/home', 'PostsController@homeCategory');
    Route::get('/postSections', 'PostsController@postSection');
    Route::get('/languages', 'FrontEndController@lanAll');
    Route::get('/language/{id}', 'FrontEndController@lanGet');
    Route::get('/site-info/{id}', 'FrontEndController@SiteInfo');
});
