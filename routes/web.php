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

//Series
Route::get('/', 'SeriesController@index')
    ->name('listar_series');

Route::get('/series', 'SeriesController@index')
    ->name('listar_series');

Route::get('/series/criar', 'SeriesController@create')
    ->name('criar_serie');

Route::post('/series/criar', 'SeriesController@store');

Route::delete('/series/{id}', 'SeriesController@destroy');

//Categorias

Route::get('/categorias', 'CategoriasController@index')
    ->name('listar_categorias');

Route::get('/categorias/criar', 'CategoriasController@create')
->name('criar_categorias');

Route::post('/categorias/criar', 'CategoriasController@store');

Route::delete('/categorias/{id}', 'CategoriasController@destroy');
