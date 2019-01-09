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

/* Rotas da área pública */
Route::get('/', 'SiteController@index')->name('index');
Route::get('/test', 'SiteController@test');
Route::get('/seedGenres', 'SiteController@seedGenres');
Route::get('/seedMovies', 'SiteController@seedMovies');
Route::get('/seedItems', 'SiteController@seedItems');
Route::get('/sn', 'SiteController@serial_number');
Route::get('/seedPerson', 'SiteController@seedPerson');

/* Rotas da área administrativa */
Route::get('/locadora', 'HomeController@index')->name('home');

/* Rotas de autenticação */
Route::get('/entrar', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/entrar', 'Auth\LoginController@login');
Route::post('/sair', 'Auth\LoginController@logout')->name('logout');
Route::post('/senha/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/senha/recuperar', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/senha/recuperar', 'Auth\ResetPasswordController@reset');
Route::get('/senha/recuperar/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('/senha/alterar', 'HomeController@change_password')->name('password.change');
Route::put('/senha/alterar', 'HomeController@update_password');

/* Rotas do model Genre */
Route::get('/genero','GenreController@index')->name('genre.index');
Route::get('/genero/adicionar','GenreController@create')->name('genre.create');
Route::post('/genero/adicionar','GenreController@store');
Route::get('/genero/{id}/editar','GenreController@edit')->name('genre.edit');
Route::put('/genero/{id}/editar','GenreController@update');
Route::delete('/genero/{id}/remover','GenreController@destroy')->name('genre.destroy');

/* Rotas do model Type */
Route::get('/tipo','TypeController@index')->name('type.index');
Route::get('/tipo/adicionar','TypeController@create')->name('type.create');
Route::post('/tipo/adicionar','TypeController@store');
Route::get('/tipo/{id}/editar','TypeController@edit')->name('type.edit');
Route::put('/tipo/{id}/editar','TypeController@update');
Route::delete('/tipo/{id}/remover','TypeController@destroy')->name('type.destroy');

/* Rotas do model Media */
Route::get('/midia','MediaController@index')->name('media.index');
Route::get('/midia/adicionar','MediaController@create')->name('media.create');
Route::post('/midia/adicionar','MediaController@store');
Route::get('/midia/{id}/editar','MediaController@edit')->name('media.edit');
Route::put('/midia/{id}/editar','MediaController@update');
Route::delete('/midia/{id}/remover','MediaController@destroy')->name('media.destroy');
