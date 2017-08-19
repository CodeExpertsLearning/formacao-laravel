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

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'livros'], function(){
  Route::get('/', 'LivroController@index')->name('livros.index');
  Route::get('/create', 'LivroController@create')->name('livros.create');
  Route::post('/', 'LivroController@store')->name('livros.store');
  Route::get('/show/{id}', 'LivroController@show')->name('livros.show');
  Route::get('/edit/{id}', 'LivroController@edit')->name('livros.edit');
  Route::put('/edit/{id}', 'LivroController@update')->name('livros.update');
  Route::delete('/{id}', 'LivroController@delete')->name('livros.delete');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'clientes'], function(){
  Route::get('/', 'ClienteController@index')->name('clientes.index');
  Route::get('/create', 'ClienteController@create')->name('clientes.create');
  Route::post('/', 'ClienteController@store')->name('clientes.store');
  Route::get('/show/{id}', 'ClienteController@show')->name('clientes.show');
  Route::get('/edit/{id}', 'ClienteController@edit')->name('clientes.edit');
  Route::put('/edit/{id}', 'ClienteController@update')->name('clientes.update');
  Route::delete('/{id}', 'ClienteController@delete')->name('clientes.delete');
});
