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
Route::post('/', 'SiteController@index');


/*
Route::get('/test', 'SiteController@test');
Route::get('/seedGenres', 'SiteController@seedGenres');
Route::get('/seedMovies', 'SiteController@seedMovies');
Route::get('/seedItems', 'SiteController@seedItems');
Route::get('/sn', 'SiteController@serial_number');
Route::get('/seedPerson', 'SiteController@seedPerson');
*/

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

/* Rotas do model Distributor */
Route::get('/distribuidora','DistributorController@index')->name('distributor.index');
Route::get('/distribuidora/adicionar','DistributorController@create')->name('distributor.create');
Route::post('/distribuidora/adicionar','DistributorController@store');
Route::get('/distribuidora/{id}/editar','DistributorController@edit')->name('distributor.edit');
Route::put('/distribuidora/{id}/editar','DistributorController@update');
Route::delete('/distribuidora/{id}/remover','DistributorController@destroy')->name('distributor.destroy');

/* Rotas do model Item */
Route::get('/item','ItemController@index')->name('item.index');
Route::get('/item/adicionar','ItemController@create')->name('item.create');
Route::post('/item/adicionar','ItemController@store');
Route::get('/item/{id}/editar','ItemController@edit')->name('item.edit');
Route::put('/item/{id}/editar','ItemController@update');
Route::delete('/item/{id}/remover','ItemController@destroy')->name('item.destroy');

/* Rotas do model Movie */
Route::get('/filme','MovieController@index')->name('movie.index');
Route::get('/filme/adicionar','MovieController@create')->name('movie.create');
Route::post('/filme/adicionar','MovieController@store');
Route::get('/filme/{id}/editar','MovieController@edit')->name('movie.edit');
Route::put('/filme/{id}/editar','MovieController@update');
Route::delete('/filme/{id}/remover','MovieController@destroy')->name('movie.destroy');
Route::get('/filme/{id}', 'SiteController@movie_details')->name('movie_details');

/* Rotas do model User */
Route::get('/usuario','UserController@index')->name('user.index');
Route::get('/usuario/adicionar','UserController@create')->name('user.create');
Route::post('/usuario/adicionar','UserController@store');
Route::get('/usuario/{id}/editar','UserController@edit')->name('user.edit');
Route::put('/usuario/{id}/editar','UserController@update');
Route::delete('/usuario/{id}/remover','UserController@destroy')->name('user.destroy');
