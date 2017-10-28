<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
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

Route::get('mensagens/{escola}/{tipo}', 'ModeloAvisoController@modeloPorEscola', ['middleware' => 'auth']);

Route::get('importacao/{id}/titulos', 'TituloController@titulos', ['middleware' => 'auth']);
Route::get('importacao/{estado}', 'TituloController@importacao', ['middleware' => 'auth']);
Route::post('importa/{estado}', 'TituloController@importa', ['middleware' => 'auth']);

Route::post('sms', 'AvisoController@enviarAviso', ['middleware' => 'auth']);
Route::post('envialote', 'AvisoController@enviarLoteAviso', ['middleware' => 'auth']);

Route::get('avisos/sms/{aviso_id}', 'AvisosController@enviaSMS', ['middleware' => 'auth']);
Route::post('avisos/ligacao/', 'AvisosController@salvaLigacao', ['middleware' => 'auth']);

Route::get('titulos/modulo/{estado}', 'TituloController@titulosModulo', ['middleware' => 'auth']);

Route::get('avisos/sms/{aviso_id}', 'AvisoController@enviaSMS');
Route::post('avisos/ligacao/', 'AvisoController@salvaLigacao');

Route::resource('contatos', 'ContatoController');
Route::resource('users', 'UserController', ['middleware' => 'auth']);
Route::get('users/{id}/permissoes', 'UserController@getPermissoesUsuario')->middleware('auth');

Route::resource('acordos', 'AcordoController', ['middleware' => 'auth']);

Route::post('storealuno', 'AcordoController@storealuno', ['middleware' => 'auth']);

Route::post('storeempresa', 'AcordoController@storeempresa', ['middleware' => 'auth']);

Route::get('acordofinal/{aluno}/{empresa}', ['as' => 'acordofinal', 'uses' => 'AcordoController@finalizarAcordo', 'middleware' => 'auth']);

Route::get('escolhealuno/{empresa}', ['as' => 'escolhealuno', 'uses' => 'AcordoController@escolheAluno', 'middleware' => 'auth']);

Route::resource('permUserEmpresas', 'PermUserEmpresaController');
