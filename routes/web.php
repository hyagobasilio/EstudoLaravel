<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

<<<<<<< HEAD

Route::get('contact/create', 'ContactController@create')->name('contact.create');
Route::get('contact', 'ContactController@index')->name('contact.index');
Route::post('contact', 'ContactController@store')->name('contact.store');
Route::get('/contact/{id}', 'ContactController@show')->name('contact.show');
Route::get('/contact/{id}/edit', 'ContactController@edit')->name('contact.edit');
Route::put('/contact/{id}', 'ContactController@update')->name('contact.update');
Route::delete('/contact/{id}', 'ContactController@destroy')->name('contact.destroy');
Route::get('/', 'ContactController@homepage')->name('contact.homepage');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
=======
Route::get('contatorafael/create', 'ContatoRafaelController@create')->name('contatorafael.create');
Route::get('contatorafael', 'ContatoRafaelController@index')->name('contatorafael.index');
Route::post('contatorafael', 'ContatoRafaelController@store')->name('contatorafael.store');

Route::get("contatogonzaga/create", "ContatoGonzagaController@create")->name("contatogonzaga.create");
Route::get("contatogonzaga", "ContatoGonzagaController@index")->name("contatogonzaga.index");
Route::get("contatogonzaga", "ContatoGonzagaController@store")->name("contatogonzaga.store");
>>>>>>> 2bddb1954085dd226822a4e8e03e2874ea3a696a
