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

//login e usuarios
Route::get('/login', 'LoginController@logar');

Route::get('/login/logout', 'LoginController@logout');

Route::get('/usuarios', 'LoginController@listaUsuarios');

Route::post('/usuarios/cadastrar', 'LoginController@cadastrarUsuarios');
//end login e usuarios


//propriedades
Route::get('/editar', 'CadastrarController@editar');

Route::get('/dashboard', 'CadastrarController@dashboard');

Route::get('/cadastrar', 'CadastrarController@form');

Route::post('/cadastrar/cadastrarFormulario', 'CadastrarController@cadastrarFormulario');
//end propriedades


//ajax
Route::get('/municipio/lista', 'CadastrarController@listaMunicipios');

Route::get('/distritos/lista', 'CadastrarController@listaDistritos');

Route::get('/localidades/lista', 'CadastrarController@listaLocalidades');
//end ajax
