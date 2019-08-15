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

Auth::routes();

Route::get('/', function () {
    return redirect(route('home'));;
});

Route::resource('veiculo', 'VeiculoController');
Route::resource('cliente', 'ClienteController');
Route::resource('cliente.locacao', 'LocacaoController');


Route::get('/home', 'HomeController@index')->name('home');
