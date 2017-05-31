<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LeadController;
use Request;
use DB;
use App\Http\Requests\usuarioRequest;
use App\User;
use Hash;
use Auth;

Class LoginController extends Controller {

  public function login(){
    return view('dashboard');
  }

  public function listaUsuarios(){
    $usuarios = User::all();

    return view('form_usuarios')
          ->with('usuarios', $usuarios);
  }

  public function cadastrarUsuarios(usuarioRequest $request){
    date_default_timezone_set('America/Sao_Paulo');
		$data = date('Y-m-d H:i:s');

    //cria objeto usuario e salva no banco
    $usuario = new User();
    $usuario->name = $request->nome;
    $usuario->email = $request->email;
    $usuario->tipo_usuario = $request->tipo_usuario;
    $senhaHash = Hash::make($request->senha); //faz o hash da senha
    $usuario->password = $senhaHash;
    $usuario->created_at = $data;
    $usuario->save();

    return redirect('/usuarios')
					->withInput();
  }

  public function logar(){
    $email = Request::input('email');
		$senha = Request::input('password');

    //autenticacao no banco
		if(Auth::attempt(['email' => $email, 'password' => $senha])) {
			return view('dashboard');
    }
    else{
      $erro = false;

			return view('index')
						->with('erro', $erro);
    }
	}

	public function logout(){
		Auth::logout();

		return redirect('/');
	}

}
