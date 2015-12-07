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

Route::get('/listing', 'listing_controller@index');
Route::get('/', 'listing_controller@index');
Route::get('/listing/{id}', 'listing_controller@show');
Route::post('/reserve', 'reserve_controller@create');
//route to see what listings this producer has
Route::get('listings', ['middleware' => 'auth', 
    'uses' => 'producer_controller@view_available']);

Route::get('reserved', ['middleware' => 'auth', 
    'uses' => 'producer_controller@view_reserved']);

Route::get('create', ['middleware' => 'auth',
    'uses' => 'listing_controller@create']);

Route::post('/list', ['middleware' => 'auth',
    'uses' => 'listing_controller@store']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
