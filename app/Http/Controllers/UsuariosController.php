<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Http\Requests\usuarioRequest;
use App\User;
use Hash;
use Auth;

Class UsuariosController extends Controller {

  public function listaUsuarios(){
    if(Auth::user() == null){ //verifica se tem sessao do usuario
      return view('index');
    }
    if(Auth::user()->tipo_usuario == 'Admin'){
      $usuarios = DB::table('users')
                  ->where('id', '!=', Auth::user()->id)
                  ->select('users.*')
                  ->get();

      return view('form_usuarios')
            ->with('usuarios', $usuarios);
    }
    if(Auth::user()->tipo_usuario != 'Admin'){
      return view('aviso');
    }
  }//end listaUsuarios

  public function cadastrarUsuarios(usuarioRequest $request){
    if(Auth::user() == null){ //verifica se tem sessao do usuario
      return view('index');
    }
    if(Auth::user()->tipo_usuario == 'Admin'){
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
    if(Auth::user()->tipo_usuario != 'Admin'){
      return view('aviso');
    }
  }//end cadastrarUsuarios

  public function excluirUsuarios($usuario_id){
    if(Auth::user() == null){ //verifica se tem sessao do usuario
      return view('index');
    }
    if(Auth::user()->tipo_usuario == 'Admin'){
      $usuario_id = REQUEST::route('usuario_id'); //pega o id da url
      $usuario = User::find($usuario_id);
      $usuario->delete();
      $usuarios = User::all();
      $deletado = true;

  		return view('form_usuarios')
  					->with('usuarios', $usuarios)
  					->with('deletado', $deletado);
    }
    if(Auth::user()->tipo_usuario != 'Admin'){
      return view('aviso');
    }
	}//end excluirUsuarios

}
