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
