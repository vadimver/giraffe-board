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
Auth::routes();

Route::get('/', 'BoardController@index');
Route::get('/edit', ['middleware' => 'auth', 'uses' => 'BoardController@edit'])->name('edit');
Route::post('/create', 'BoardController@create');
/*

Route::get('/edit', 'BoardController@edit');

Route::get('/{id}', 'BoardController@show');
Route::delete('/delete/{id}', 'BoardController@destroy');
Route::put('/edit/{id}', 'BoardController@update');
 * 
 */

Route::get('/testregister', 'Auth\RegisterController@register');



