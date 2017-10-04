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

Route::get('/paginainicial', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/dashboard', 'HomeController@dashboard')->middleware('auth');

Route::resource('alunos', 'ClienteController', ['middleware' => 'auth']);

Route::resource('escolas', 'EmpresaController', ['middleware' => 'auth']);

Route::resource('titulos', 'TituloController', ['middleware' => 'auth']);

Route::resource('avisos', 'AvisoController', ['middleware' => 'auth']);

Route::resource('avisosEnviados', 'AvisosEnviadoController', ['middleware' => 'auth']);

Route::resource('importacaos', 'ImportacaoController', ['middleware' => 'auth']);

Route::resource('modeloAvisos', 'ModeloAvisoController', ['middleware' => 'auth']);

Route::get('mensagens/{escola}/{tipo}', 'ModeloAvisoController@modeloPorEscola');

Route::get('importacao/{id}/titulos', 'TituloController@titulos');
Route::get('importacao/{estado}', 'TituloController@importacao');
Route::post('importa/{estado}', 'TituloController@importa');

Route::post('sms', 'AvisoController@enviarAviso');
Route::post('envialote', 'AvisoController@enviarLoteAviso');

Route::get('avisos/sms/{aviso_id}', 'AvisosController@enviaSMS');
Route::post('avisos/ligacao/', 'AvisosController@salvaLigacao');

Route::get('titulos/modulo/{estado}', 'TituloController@titulosModulo');

Route::get('avisos/sms/{aviso_id}', 'AvisoController@enviaSMS');
Route::post('avisos/ligacao/', 'AvisoController@salvaLigacao');

Route::resource('contatos', 'ContatoController');
Route::resource('users', 'UserController');


Route::resource('acordos', 'AcordoController');