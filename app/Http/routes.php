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

Route::group(['middleware' => 'auth'], function() {

  Route::get('/listing', 'listing_controller@index');
  Route::get('/home', 'listing_controller@index');
  Route::get('/', 'listing_controller@index');
  Route::get('/listing/{id}', 'listing_controller@show');

  Route::post('/listing/delete/{id}', 'listing_controller@destroy');

  Route::get('/listing/edit/{id}', 'listing_controller@edit');

  Route::post('/listing/update/{id}', 'listing_controller@update');

  //route to see what listings this producer has
  Route::get('listings', 'producer_controller@view_available');

  Route::get('reserved', 'producer_controller@view_reserved');

  Route::get('create', 'listing_controller@create');

  Route::post('/list', 'listing_controller@store');

  //routes for reservations
  Route::post('/reserve', 'reserve_controller@create');
  Route::post('/reserve/cancel/{id}', 'reserve_controller@destroy');


  // Authentication routes...
  Route::get('auth/logout', 'Auth\AuthController@getLogout');

  Route::get('/reports', 'report_controller@create');

  Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', 'admin_controller@index');
    Route::get('/producer/create', 'producer_controller@create');
    Route::post('/producer/store', 'producer_controller@store');
    Route::get('/producer/manage', 'producer_controller@manage');
    Route::get('/producer/delete/{id}', 'producer_controller@destroy');
  });
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
