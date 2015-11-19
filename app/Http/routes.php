<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');
Route::get('about', 'PagesController@about');

Route::get('user/{id}', 'CoinsController@userCollection');

Route::resource('coins', 'CoinsController');

Route::resource('copies', 'CopiesController');
Route::get('copies/create/{id}', 'CopiesController@create');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('verify/{token}', 'VerificationController@verify');

Route::controller('api', 'ApiController');