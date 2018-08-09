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

Route::get('/', 'BoardController@');
Route::get('/edit', 'BoardController@');
Route::post('/create', 'BoardController@');
Route::get('/{id}', 'BoardController@');
Route::delete('/delete/{id}', 'BoardController@');
Route::put('/edit/{id}', 'BoardController@');
