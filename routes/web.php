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

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('perfil', 'PerfilController');


//Route::get('perfil', 'PerfilController@index');

Route::resource('changepass', 'PerfilController');
Route::resource('home', 'HomeController');
Route::get('add', 'HomeController@create');
Route::get('itens', 'HomeController@itens');
Route::get('changepass', 'PerfilController@Changepass');


Route::post('create', 'HomeController@store');
Route::post('delete', 'HomeController@delete');
Route::post('changepassword','PerfilController@changePassword');


