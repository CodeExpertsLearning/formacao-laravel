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

Route::group(['middleware' => ['auth'], 'prefix' => 'books'], function () {
    Route::get('/', 'BookController@index')->name('book.index');
    Route::get('/create', 'BookController@create')->name('book.create');
    Route::post('/', 'BookController@store')->name('book.store');
    Route::get('/show/{id}', 'BookController@show')->name('book.show');
    Route::get('/edit/{id}', 'BookController@edit')->name('book.edit');
    Route::put('/edit/{id}', 'BookController@update')->name('book.update');
    Route::delete('/{id}', 'BookController@destroy')->name('book.delete');
});
