<?php

use Illuminate\Http\Request;
use Modules\ContentManager\Entities\User;
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

Route::prefix('user')->middleware('auth:api')->group(function(){
	Route::get('/list',function(){
		return User::all();
	});
});

Route::middleware('auth:api')->get('/contentmanager', function (Request $request) {
    return "jj";
    return $request->user();
});
// Route::get('/contentmanager', function (Request $request) {
//     return "ss";
// });
Route::prefix('contentmanager')->middleware('auth:api')->group(function() {
	Route::post('/','ContentManagerController@index');
	Route::post('/store','ContentManagerController@store');
	Route::delete('/delete/{id}','ContentManagerController@delete');

});

