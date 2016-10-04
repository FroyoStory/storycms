<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

//--------------------------------------------------------------------------
// PUBLIC ROUTES
//--------------------------------------------------------------------------
Route::get('/', 'Front\HomeController@index');
Route::get('blog', 'Front\PostController@index');
Route::get('blog/{slug}', 'Front\PostController@show');
//--------------------------------------------------------------------------

//--------------------------------------------------------------------------
// AUTH ROUTES
//--------------------------------------------------------------------------
Route::get('signin', 'Auth\LoginController@showLoginForm');
Route::post('signin', 'Auth\LoginController@login');
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::get('register-success', 'Auth\RegisterController@success');
Route::post('register', 'Auth\RegisterController@register');
Route::get('auth/confirm/{token}', 'Auth\ConfirmController@store');
Route::post('auth/resend', 'Auth\ConfirmController@resend');
//--------------------------------------------------------------------------

//--------------------------------------------------------------------------
// BACKEND LAYOUT ROUTES
//--------------------------------------------------------------------------
Route::get('backend', 'Backend\HomeController@index');
//--------------------------------------------------------------------------

//--------------------------------------------------------------------------
// API ROUTES
//--------------------------------------------------------------------------
Route::group(['prefix' => 'api'], function () {
    Route::resource('posts', 'Api\PostController', ['except' => ['edit', 'create']]);
    Route::resource('categories', 'Api\CategoryController', ['except' => ['edit', 'create']]);

    Route::post('upload', 'Api\UploadController@store');
    Route::post('settings', 'Api\SettingController@store');

    Route::get('teams', 'Api\TeamController@index');
});
//--------------------------------------------------------------------------
