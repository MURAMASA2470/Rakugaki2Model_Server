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

Route::get('/', 'Api\EventController@index')->name('index');
Route::get('/add/{obj}/{img}', 'Api\EventController@add')->name('add');
Route::post('/generate', 'Api\EventController@generate')->name('generate');
