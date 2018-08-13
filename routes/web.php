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

Route::get('/', 'BoardController@index')->name('main');
Route::get('/edit', ['middleware' => 'auth', 'uses' => 'BoardController@edit'])->name('edit');
Route::get('/edit/{id}', ['middleware' => 'auth', 'uses' => 'BoardController@edit'])->name('edit_id');
Route::post('/create', 'BoardController@create');
Route::get('/delete/{id}', 'BoardController@destroy');
Route::get('/{id}', 'BoardController@show');
Route::put('/edit/{id}', 'BoardController@update');



