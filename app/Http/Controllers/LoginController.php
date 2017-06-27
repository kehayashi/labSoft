<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Http\Requests\usuarioRequest;
use App\User;
use Hash;
use Auth;

Class LoginController extends Controller {

  public function logar(){
    Auth::logout(); //encerra sessao caso tenha uma ativa

    $email = Request::input('email');
		$senha = Request::input('password');

    //autenticacao no banco
		if(Auth::attempt(['email' => $email, 'password' => $senha])) {

      date_default_timezone_set('America/Sao_Paulo');
  		$data = date('Y-m-d H:i:s');

      $user = User::find(Auth::user()->id);
      $user->logged_at = $data;
      $user->save();

      $countPropSantiago = DB::table('propriedade')->where('cod_municipio', '=', 2)->count();
      $countPropSantamaria = DB::table('propriedade')->where('cod_municipio', '=', 1)->count();

      return view('dashboard')
          ->with('countPropSantiago', $countPropSantiago)
          ->with('countPropSantamaria', $countPropSantamaria);
    }
    else{
      $erro = false;

			return view('index')
						->with('erro', $erro);
    }
	}

	public function logout(){
    if(Auth::user() == null){//verifica se tem sessao do usuario
      return view('index');
    }
    else{
  		Auth::logout();

  		return redirect('/');
    }
	}

}
