<?php

namespace App\Http\Controllers;

use Request;
use App\Propriedade;
use App\Propriedade_historico;
use App\Nucleo_familiar;
use DB;
use Auth;

Class ExcluirController extends Controller {

  //excluir propriedade
  public function excluirPropriedade(){
    if(Auth::user() == null){ //verifica se tem sessao do usuario
      return view('index');
    }
    else{
      $cod_prop = REQUEST::route('cod_prop');

      DB::beginTransaction(); //begin no bando de dados pra iniciar a transacao

      //excluir dados
      $nucleos = DB::select("SELECT *
                                FROM nucleo_familiar, possui_nucleo, propriedade_historico
	                                WHERE nucleo_familiar.cod_nucleo = possui_nucleo.cod_nucleo
		                                  AND possui_nucleo.cod_prop = propriedade_historico.cod_prop
			                                     AND propriedade_historico.cod_prop = $cod_prop ");

      foreach ($nucleos as $nf) {
          $n = Nucleo_familiar::find($nf->cod_nucleo);
          $n->propriedade_historico()->detach($cod_prop);
          $n->ocupacao()->detach($cod_prop);
          $n->delete();
      }

      $result = DB::table('possui_ativ')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('possui_apoio')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('tem_problemas')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('tem_motivacao')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('tem_cultivo')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('possui_irrigacao')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('possui_pulverizador')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('possui_tracao')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('possui_plasticultura')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('possui_pulverizador')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('tem_adubo')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('tem_agua')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('ampliacao')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('dest_producao')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('possui_pulverizador')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('falta_produtos')->where('cod_prop', '=', $cod_prop)->delete();
      $result = DB::table('producao')->where('cod_prop', '=', $cod_prop)->delete();
      $result = $propriedade_historico = Propriedade_historico::find($cod_prop);
      $result = $propriedade_historico->delete();
      $result = $propriedade = Propriedade::find($cod_prop);
      $result = $propriedade->delete();

      //end excluir dados

      DB::commit(); //commit no banco de dados

      $propriedades = DB::select
              ("SELECT nome, propriedade.cod_prop, nome_municipio
  	               FROM municipio, nucleo_familiar, possui_nucleo, propriedade_historico, propriedade, parentesco
                     WHERE propriedade.cod_prop = propriedade_historico.cod_prop
  			                AND propriedade_historico.cod_prop = possui_nucleo.cod_prop
                           AND possui_nucleo.cod_nucleo = nucleo_familiar.cod_nucleo
  				                    AND nucleo_familiar.cod_parentesco = parentesco.cod_parentesco
                                 AND municipio.cod_municipio = propriedade.cod_municipio
  					                        AND parentesco.cod_parentesco = 1
  						                         ORDER BY cod_prop");

      if($result){
        $excluido = 'true';

        return view('lista_propriedades')
                ->with('excluido', $excluido)
                ->with('propriedades', $propriedades);
      }
      else{
        $error = 'true';
          return view('lista_propriedades')
                  ->with('error', $error)
                  ->with('propriedades', $propriedades);
      }

    }//end else

  }//end excluir propriedade

}
