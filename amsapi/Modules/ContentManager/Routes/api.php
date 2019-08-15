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

Route::middleware('auth:api')->get('/contentmanager', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api'], 'prefix' => '/content-manager', 'namespace' => 'Modules\ContentBank\Http\Controllers\api'], function () {
    Route::get('/api/load_data', 'ContentManagerController@load_content')->name('load_content_bank');
    Route::get('/api/load_data/{req_val}', 'ContentManagerController@load_content')->name('load_content_bank_by_req');
});

Route::group(['middleware' => ['auth:api'], 'prefix' => '{username}/content-manager', 'namespace' => 'Modules\ContentBank\Http\Controllers\api'], function () {
    Route::post('/api/edit_data', 'ContentManagerController@load_edit_content')->name('edit_content_bank');  
    Route::get('/api/show_data/{id}', 'ContentManagerController@load_show_content')->name('show_content_bank');
    Route::get('/api/delete/{id}', 'ContentManagerController@delete_content');
});

Route::group(['middleware' => ['web', 'AuthCheck'], 'prefix' => '{username}/content-manager', 'namespace' => 'Modules\ContentBank\Http\Controllers\api'], function () {    
    Route::post('/api/chunk', 'UploadContentController@chunk')->name('chunk_content_bank');
    Route::post('/api/chunk_merge', 'UploadContentController@chunk_merge')->name('chunk_merge_content_bank');
    Route::post('/api/upload', 'UploadContentController@store')->name('upload_content_bank');
});

Route::group(['middleware' => ['web', 'AuthCheck'], 'prefix' => '{username}/content-manager', 'namespace' => 'Modules\ContentBank\Http\Controllers\api'], function () {
    Route::post('/api/submit', 'UploadContentController@update')->name('submit_content_bank');
});