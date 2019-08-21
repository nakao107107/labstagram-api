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
Route::middleware('check_auth')->group(function () {

    Route::get('/users/{user_id}', 'UserController@show');

    Route::get('/posts', 'PostController@index');
    Route::post('/posts', 'PostController@store');
    
    Route::get('/likes', 'LikeController@index');
    Route::post('/likes', 'LikeController@store');

});


// Route::get('/users/{user_id}', 'UserController@show');

// Route::get('/posts', 'PostController@index');
// Route::post('/posts', 'PostController@store');

// Route::get('/likes', 'LikeController@index');
// Route::post('/likes', 'LikeController@store');