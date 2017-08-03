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
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('clientes', 'ClienteController');

Route::resource('empresas', 'EmpresaController');

Route::resource('titulos', 'TituloController');

Route::resource('avisos', 'AvisoController');

Route::resource('avisosEnviados', 'AvisosEnviadoController');

Route::resource('importacaos', 'ImportacaoController');

Route::resource('modeloAvisos', 'ModeloAvisoController');