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

Route::get('/create/crud','CrudController@create');

Route::post('/create/crud','CrudController@store');

Route::get('/crud', 'CrudController@index');

Route::get('/edit/crud/{id}','CrudController@edit');

Route::post('/edit/crud/{id}','CrudController@update');

Route::delete('/delete/crud/{id}','CrudController@destroy');