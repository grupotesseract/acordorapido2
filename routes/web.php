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

Route::get('/dashboard', 'HomeController@dashboard')->middleware('auth');

Route::resource('clientes', 'ClienteController', ['middleware' => 'auth']);
Route::resource('alunos', 'ClienteController', ['middleware' => 'auth']);

Route::resource('empresas', 'EmpresaController', ['middleware' => 'auth']);
Route::resource('escolas', 'EmpresaController', ['middleware' => 'auth']);

Route::resource('titulos', 'TituloController', ['middleware' => 'auth']);

Route::resource('avisos', 'AvisoController', ['middleware' => 'auth']);

Route::resource('avisosEnviados', 'AvisosEnviadoController', ['middleware' => 'auth']);

Route::resource('importacaos', 'ImportacaoController', ['middleware' => 'auth']);

Route::resource('modeloAvisos', 'ModeloAvisoController', ['middleware' => 'auth']);
