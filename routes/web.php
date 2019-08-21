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

// Route::get('github', 'Github\GithubController@top');
// Route::post('github/issue', 'Github\GithubController@createIssue');
// Route::get('login/github', 'Auth\LoginController@redirectToProvider');

Route::get('/oauth/login/redirect', 'Auth\LoginController@getRedirectUrl');
Route::get('/oauth/login/callback', 'Auth\LoginController@handleProviderCallback');




