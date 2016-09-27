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

Route::get('/', function () {
    return view('welcome');
});

Route::get('backend', 'Backend\HomeController@index');

Route::get('signin', 'Auth\LoginController@showLoginForm');
Route::post('signin', 'Auth\LoginController@login');
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');

Route::group(['prefix' => 'backend'], function () {
    Route::get('posts', 'Backend\PostController@index');
    Route::get('posts/create', 'Backend\PostController@create');
    Route::get('posts/{id}/edit', 'Backend\PostController@edit');
    Route::get('teams', 'Backend\TeamController@index');
    Route::get('settings/general', 'Backend\Settings\GeneralController@index');
});

Route::group(['prefix' => 'api'], function () {
    Route::resource('posts', 'Api\PostController', ['except' => ['edit', 'create']]);
    Route::resource('categories', 'Api\CategoryController', ['except' => ['edit', 'create']]);

    Route::get('teams', 'Api\TeamController@index');
});
