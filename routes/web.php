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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('cotizaciones', 'CotizacionController@create')->name('cotizaciones.create');
Route::get('cotizaciones/{cotizacion}', 'CotizacionController@show')->name('cotizaciones.show');
Route::delete('cotizaciones/{cotizacion}', 'CotizacionController@destroy')->name('cotizaciones.destroy');
Route::get('perfil','PerfilController@show')->name('perfil.show');
Route::get('perfil/{user}/edit','PerfilController@edit')->name('perfil.edit');
Route::put('perfil/{user}','PerfilController@update')->name('perfil.update');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});