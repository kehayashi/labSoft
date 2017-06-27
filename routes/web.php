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
    return view('index');
});

//login
Route::post('/login', 'LoginController@logar');

Route::get('/login/logout', 'LoginController@logout');
// end login


//usuarios
Route::get('/usuarios', 'UsuariosController@listaUsuarios');

Route::post('/usuarios/cadastrar', 'UsuariosController@cadastrarUsuarios');

Route::get('/usuarios/excluir/{usuario_id}', 'UsuariosController@excluirUsuarios');
//end usuarios


//dashboard
Route::get('/dashboard', 'CadastrarController@dashboard');//dashboard

Route::get('/dashboard/listaPropriedades', 'CadastrarController@listaPropriedades');//dashboard
//end dashboard

//propriedades
Route::get('/editar', 'EditarController@editar');//editar

Route::get('/editar/carregaDadosFormulario/{cod_prop}', 'EditarController@carregaDadosFormulario');//editar

Route::post('/editar/editarFormulario', 'EditarController@editarFormulario');//editar

Route::get('/cadastrar', 'CadastrarController@form');//cadastrar

Route::post('/cadastrar/cadastrarFormulario', 'CadastrarController@cadastrarFormulario');//cadastrar

Route::get('/excluir/excluirFormulario/{cod_prop}', 'ExcluirController@excluirPropriedade');//excluir
//end propriedades

//relatorios
//Route::get('/relatorio', 'RelatorioController@gerarRelatorio');

Route::get('/relatorio', 'RelatorioController@info');

Route::get('/relatorio/donwloadRelatorio', 'RelatorioController@donwloadRelatorio');
//end relatorios


//ajax
Route::get('/municipio/lista', 'CadastrarController@listaMunicipios');

Route::get('/distritos/lista', 'CadastrarController@listaDistritos');

Route::get('/localidades/lista', 'CadastrarController@listaLocalidades');
//end ajax


//ajax
Route::get('/cultura/lista', 'CadastrarController@listaCulturas');

Route::get('/cultivares/lista', 'CadastrarController@listaCultivares');
//end ajax
