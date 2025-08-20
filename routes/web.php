<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('contato/create', 'ContatoController@create')->name('contato.create');
Route::get('contato', 'ContatoController@index')->name('contato.index');
Route::post('contato', 'ContatoController@store')->name('contato.store');
