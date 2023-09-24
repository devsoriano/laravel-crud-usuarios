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


Route::get('/usuarios', 'App\Http\Controllers\UsuarioController@index')->name('usuarios.index');
Route::get('/usuarios/create', 'App\Http\Controllers\UsuarioController@create')->name('usuarios.create');
Route::post('/usuarios', 'App\Http\Controllers\UsuarioController@store')->name('usuarios.store');
Route::get('/usuarios/{id}/edit', 'App\Http\Controllers\UsuarioController@edit')->name('usuarios.edit');
Route::put('/usuarios/{id}', 'App\Http\Controllers\UsuarioController@update')->name('usuarios.update');
Route::delete('/usuarios/{id}', 'App\Http\Controllers\UsuarioController@destroy')->name('usuarios.destroy');

