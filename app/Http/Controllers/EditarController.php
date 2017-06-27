<?php

namespace App\Http\Controllers;

use Request;
use App\Municipio;
use App\Distrito;
use App\Localidade;
use App\Propriedade;
use App\Propriedade_historico;
use App\Parentesco;
use App\Escolaridade;
use App\Ocupacao;
use App\Atividade;
use App\Nucleo_familiar;
use App\Motivacao;
use App\Apoio;
use App\Cultivo;
use App\Pulverizador;
use App\Tracao;
use App\Irrigacao;
use App\Adubo;
use App\Problemas;
use App\Plasticultura;
use App\Agua;
use App\Culturas;
use App\Cultivar_cultura;
use App\Producao;
use App\Destino;
use App\Http\Requests\CadastroRequest;
use DB;
use Auth;

Class EditarController extends Controller {

    public function editar(){
      //verifica se tem sessao do usuario
      if(Auth::user() == null){
        return view('index');
      }
      else{
         // busca nome do responsavel, codigo da propriedade e municipio da propriedade
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

        return view('lista_propriedades')
                ->with('propriedades', $propriedades);
      }//end else

    }//end editar

    public function carregaDadosFormulario(){
      if(Auth::user() == null){
        return view('index');
      }
      else{
        $cod_prop = REQUEST::route('cod_prop');

        //busca toda tabela propriedade_historico
        $propriedade_historico = Propriedade_historico::find($cod_prop);

        //busca a propriedade com a coordenada tipo st_astext point(latitude longitude)
        $propriedade = Propriedade::where('cod_prop', $cod_prop)
                            ->select('cod_prop', 'cod_municipio', 'cod_distrito', 'cod_local',
                                    DB::raw("st_astext(coordenada_geo)"))->get();

        //separa a latitude da longitude
        $string = (string) $propriedade[0]->st_astext;
        $array = (explode("(", $string));
        $string2 = $array[1];
        $array2 = (explode(" ", $string2));
        $longitude= $array2[0];
        $string3 = $array2[1];
        $array3 = (explode(")", $string3));
        $latitude = $array3[0];

        //busca nucleo_familiar
        $nucleo_familiar = new Nucleo_familiar();
        $nucleo_familiar = DB::table('nucleo_familiar')
                    ->where('propriedade_historico.cod_prop', '=', $cod_prop)
					->join('possui_nucleo', 'nucleo_familiar.cod_nucleo', '=', 'possui_nucleo.cod_nucleo')
					->join('propriedade_historico', 'possui_nucleo.cod_prop', '=', 'propriedade_historico.cod_prop')
					->select('nucleo_familiar.*')
					->get();

        $ativImport1 = DB::table('possui_ativ')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 1)
                    ->select('possui_ativ.*')
                    ->get();
        //dd($ativImport1);

        $ativImport2 = DB::table('possui_ativ')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 2)
                    ->select('possui_ativ.*')
                    ->get();
        //dd($ativImport2);

        $ativImport3 = DB::table('possui_ativ')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 3)
                    ->select('possui_ativ.*')
                    ->get();
        //dd($ativImport3);

        $ativImport4 = DB::table('possui_ativ')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 4)
                    ->select('possui_ativ.*')
                    ->get();
        //dd($ativImport4);

        $ativImport5 = DB::table('possui_ativ')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 5)
                    ->select('possui_ativ.*')
                    ->get();

        $tem_motivacoes = DB::table('tem_motivacao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->select('tem_motivacao.*')
                    ->get();
        $array_motivacoes = array();
        foreach ($tem_motivacoes as $tm) {
            array_push($array_motivacoes, $tm->cod_motiv);
        }

        $apoiosImport1 = DB::table('possui_apoio')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 1)
                    ->select('cod_apoio')
                    ->get();

        $apoiosImport2 = DB::table('possui_apoio')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 2)
                    ->select('cod_apoio')
                    ->get();

        $apoiosImport3 = DB::table('possui_apoio')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 3)
                    ->select('cod_apoio')
                    ->get();

        $apoiosImport4 = DB::table('possui_apoio')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 4)
                    ->select('cod_apoio')
                    ->get();

        $apoiosImport5 = DB::table('possui_apoio')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 5)
                    ->select('cod_apoio')
                    ->get();

        $apoiosImport6 = DB::table('possui_apoio')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 6)
                    ->select('cod_apoio')
                    ->get();

        $apoiosImport7 = DB::table('possui_apoio')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 7)
                    ->select('cod_apoio')
                    ->get();

        $apoiosImport8 = DB::table('possui_apoio')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 8)
                    ->select('cod_apoio')
                    ->get();

        $apoiosImport9 = DB::table('possui_apoio')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('importancia', '=', 9)
                    ->select('cod_apoio')
                    ->get();

        $tem_cultivos = DB::table('tem_cultivo')
                    ->where('cod_prop', '=', $cod_prop)
                    ->select('tem_cultivo.*')
                    ->get();
        $array_cultivos = array();
        foreach ($tem_cultivos as $tc) {
            array_push($array_cultivos, $tc->cod_cult);
        }

        $tem_pulverizadores = DB::table('possui_pulverizador')
                    ->where('cod_prop', '=', $cod_prop)
                    ->select('possui_pulverizador.*')
                    ->get();
        $array_pulverizadores = array();
        foreach ($tem_pulverizadores as $tp) {
            array_push($array_pulverizadores, $tp->cod_pulv);
        }

        $tem_tracoes = DB::table('possui_tracao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->select('possui_tracao.*')
                    ->get();
        $array_tracoes = array();
        foreach ($tem_tracoes as $tt) {
            array_push($array_tracoes, $tt->cod_tracao);
        }

        $tem_irrigacoes = DB::table('possui_irrigacao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->select('possui_irrigacao.*')
                    ->get();
        $array_irrigacoes = array();
        foreach ($tem_irrigacoes as $ti) {
            array_push($array_irrigacoes, $ti->cod_irrigacao);
        }

        $tem_adubos = DB::table('tem_adubo')
                    ->where('cod_prop', '=', $cod_prop)
                    ->select('tem_adubo.*')
                    ->get();
        $array_adubos = array();
        foreach ($tem_adubos as $ta) {
            array_push($array_adubos, $ta->cod_adubo);
        }

        $tem_plasticulturas = DB::table('possui_plasticultura')
                    ->where('cod_prop', '=', $cod_prop)
                    ->select('possui_plasticultura.*')
                    ->get();
        $array_plasticulturas = array();
        foreach ($tem_plasticulturas as $tpl) {
            array_push($array_plasticulturas, $tpl->cod_plastic);
        }

        $outra_plasticultura = DB::table('possui_plasticultura')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('descricao', '!=', '')
                    ->select('descricao')
                    ->get();

        $tem_aguas = DB::table('tem_agua')
                    ->where('cod_prop', '=', $cod_prop)
                    ->select('tem_agua.*')
                    ->get();
        $array_aguas = array();
        foreach ($tem_aguas as $tag) {
            array_push($array_aguas, $tag->cod_agua);
        }

        $tem_problemas = DB::table('tem_problemas')
                    ->where('cod_prop', '=', $cod_prop)
                    ->select('tem_problemas.*')
                    ->get();
        $array_problemas = array();
        foreach ($tem_problemas as $tpr) {
            array_push($array_problemas, $tpr->cod_problema);
        }

        $ampliacao = DB::table('ampliacao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->select('ampliacao.*')
                    ->get();
        $array_ampliacao = array();
        foreach ($ampliacao as $ampli) {
            array_push($array_ampliacao, $ampli->cod_cultura);
        }

        $descricao_problema = DB::table('tem_problemas')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('descricao_problema', '!=', '')
                    ->select('descricao_problema')
                    ->get();

        $producoes = DB::table('producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->select('producao.*')
                    ->get();

        $ampliacao = DB::table('ampliacao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->select('ampliacao.*')
                    ->get();
        $array_ampliacao = array();
        foreach ($ampliacao as $amp) {
            array_push($array_ampliacao, $amp->cod_cultura);
        }

        $mercado1_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 1)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado1_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 1)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado2_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 2)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado2_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 2)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado3_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 3)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado3_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 3)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado4_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 4)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado4_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 4)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado5_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 5)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado5_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 5)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado6_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 6)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado6_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 6)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado7_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 7)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado7_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 7)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado8_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 8)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado8_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 8)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado9_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 9)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado9_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 9)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado10_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 10)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado10_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 10)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado11_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 11)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado11_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 11)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado12_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 12)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado12_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 12)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado13_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 13)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado13_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 13)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $mercado14_F = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 14)
                    ->where('frutaouhortalica', '=', 1)
                    ->select('percentual')
                    ->get();

        $mercado14_H = DB::table('dest_producao')
                    ->where('cod_prop', '=', $cod_prop)
                    ->where('cod_destino', '=', 14)
                    ->where('frutaouhortalica', '=', 2)
                    ->select('percentual')
                    ->get();

        $parentescos = Parentesco::all();
        $escolaridades = Escolaridade::all();
        $ocupacoes = Ocupacao::all();
        $atividades = Atividade::all();
        $motivacoes = Motivacao::all();
        $apoios = Apoio::all();
        $cultivos = Cultivo::all();
        $pulverizadores = Pulverizador::all();
        $tracoes = Tracao::all();
        $irrigacoes = Irrigacao::all();
        $adubos = Adubo::all();
        $problemas = Problemas::all();
        $plasticulturas = Plasticultura::all();
        $agua = Agua::all();
        $culturas = Culturas::All();
        $cultivar_culturas = Cultivar_cultura::All();

        return view('form_editar_cadastro')
                ->with('parentescos', $parentescos)
                ->with('escolaridades', $escolaridades)
                ->with('ocupacoes', $ocupacoes)
                ->with('atividades', $atividades)
                ->with('motivacoes', $motivacoes)
                ->with('apoios', $apoios)
                ->with('cultivos', $cultivos)
                ->with('pulverizadores', $pulverizadores)
                ->with('tracoes', $tracoes)
                ->with('irrigacoes', $irrigacoes)
                ->with('adubos', $adubos)
                ->with('problemas', $problemas)
                ->with('plasticulturas', $plasticulturas)
                ->with('agua', $agua)
                ->with('culturas', $culturas)
                ->with('propriedade', $propriedade)
                ->with('propriedade_historico', $propriedade_historico)
                ->with('latitude', $latitude)
                ->with('longitude', $longitude)
                ->with('nucleo_familiar', $nucleo_familiar)
                ->with('ativImport1', $ativImport1)
                ->with('ativImport2', $ativImport2)
                ->with('ativImport3', $ativImport3)
                ->with('ativImport4', $ativImport4)
                ->with('ativImport5', $ativImport5)
                ->with('array_motivacoes', $array_motivacoes)
                ->with('array_cultivos', $array_cultivos)
                ->with('array_pulverizadores', $array_pulverizadores)
                ->with('array_tracoes', $array_tracoes)
                ->with('array_irrigacoes', $array_irrigacoes)
                ->with('array_adubos', $array_adubos)
                ->with('array_plasticulturas', $array_plasticulturas)
                ->with('array_aguas', $array_aguas)
                ->with('array_problemas', $array_problemas)
                ->with('tem_problemas', $tem_problemas)
                ->with('descricao_problema', $descricao_problema)
                ->with('outra_plasticultura', $outra_plasticultura)
                ->with('apoiosImport1', $apoiosImport1)
                ->with('apoiosImport2', $apoiosImport2)
                ->with('apoiosImport3', $apoiosImport3)
                ->with('apoiosImport4', $apoiosImport4)
                ->with('apoiosImport5', $apoiosImport5)
                ->with('apoiosImport6', $apoiosImport6)
                ->with('apoiosImport7', $apoiosImport7)
                ->with('apoiosImport8', $apoiosImport8)
                ->with('apoiosImport9', $apoiosImport9)
                ->with('producoes', $producoes)
                ->with('cultivar_culturas', $cultivar_culturas)
                ->with('array_ampliacao', $array_ampliacao)
                ->with('mercado1_F', $mercado1_F)
                ->with('mercado1_H', $mercado1_H)
                ->with('mercado2_F', $mercado2_F)
                ->with('mercado2_H', $mercado2_H)
                ->with('mercado3_F', $mercado3_F)
                ->with('mercado3_H', $mercado3_H)
                ->with('mercado4_F', $mercado4_F)
                ->with('mercado4_H', $mercado4_H)
                ->with('mercado5_F', $mercado5_F)
                ->with('mercado5_H', $mercado5_H)
                ->with('mercado6_F', $mercado6_F)
                ->with('mercado6_H', $mercado6_H)
                ->with('mercado7_F', $mercado7_F)
                ->with('mercado7_H', $mercado7_H)
                ->with('mercado8_F', $mercado8_F)
                ->with('mercado8_H', $mercado8_H)
                ->with('mercado9_F', $mercado9_F)
                ->with('mercado9_H', $mercado9_H)
                ->with('mercado10_F', $mercado10_F)
                ->with('mercado10_H', $mercado10_H)
                ->with('mercado11_F', $mercado11_F)
                ->with('mercado11_H', $mercado11_H)
                ->with('mercado12_F', $mercado12_F)
                ->with('mercado12_H', $mercado12_H)
                ->with('mercado13_F', $mercado13_F)
                ->with('mercado13_H', $mercado13_H)
                ->with('mercado14_F', $mercado14_F)
                ->with('mercado14_H', $mercado14_H);
      }//end else

    }//end editar formulario


    //cadastrar propriedade
  public function editarFormulario(CadastroRequest $request){
    if(Auth::user() == null){ //verifica se tem sessao do usuario
      return view('index');
    }
    else{
      date_default_timezone_set('America/Sao_Paulo');
  	  $data_ultima_alteracao = date('Y-m-d H:i:s');

      $cod_prop = $request->cod_prop;

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
      //end excluir dados

      //propriedade
      $pontoGPS = $request->longitude." ".$request->latitude;
      $propriedade = Propriedade::find($cod_prop);
      $propriedade->cod_municipio = $request->cod_municipio;
      $propriedade->cod_distrito = $request->cod_distrito;
      $propriedade->cod_local = $request->cod_local;
      $propriedade->coordenada_geo = DB::raw("ST_GeomFromText('POINT($pontoGPS)', 4674)");//salva pronto GPS
      $result = $propriedade->save();
      //end propriedade

      //propriedade_historico
      $propriedade_historico = Propriedade_historico::find($cod_prop);
      $date = date_create($request->datas);
      $datas = date_format($date, 'Y-m-d');//cria data no formato para inserir no banco
      $propriedade_historico->datas = $datas;
      $propriedade_historico->data_ultima_alteracao = $data_ultima_alteracao;
      $telefone = strtr($request->telefone, array('(' => '', ')' => '', ' ' => '', '-' => '' ));//tira caracteres para inserir no banco
      $propriedade_historico->telefone = $telefone;
      $propriedade_historico->nome_cadastrador = $request->nome_cadastrador;
      $result = $propriedade_historico->save();
      //end propriedade_historico

      //nucleo_familiar
      $nNomes = count($request->nome); //conta quantos nomes foram informados

      for ($i=0; $i < $nNomes ; $i++) {
          if( ($request->nome[$i] == 'null') ||
              ($request->cod_parentesco[$i] == 'null') ||
              ($request->cod_escolaridade[$i] == 'null') ) {
          }
          else{
            $nucleo_familiar = new Nucleo_familiar();
            $nucleo_familiar->cod_parentesco = $request->cod_parentesco[$i];
            $nucleo_familiar->cod_escolaridade = $request->cod_escolaridade[$i];
            $nucleo_familiar->sexo = $request->sexo[$i];
            $nucleo_familiar->nome = $request->nome[$i];
            $dtnasc = date_create($request->dt_nasc[$i]);
            $dt_nasc = date_format($dtnasc, 'Y-m-d');//cria data no formato para inserir no banco
            $nucleo_familiar->dt_nasc = $dt_nasc;
            $nucleo_familiar->save();

            //insert tabela pivot possui_nucleo
            $result = $nucleo_familiar->propriedade_historico()
                  ->attach($propriedade->cod_prop, array('cod_nucleo' => $nucleo_familiar->cod_nucleo, 'datas' => $datas) );
            //end possui_nucleo

            //insert tabela pivot possui_ocupacao
            $k = $i+1;
            $cod_ocupacao = 'cod_ocupacao'.$k;
            $nOcupacao = count($request->$cod_ocupacao);
            $cod = $request->$cod_ocupacao;
            for ($j=0; $j < $nOcupacao; $j++) {
                //insert tabela pivor possui_ocupacao
                $result = $nucleo_familiar->ocupacao()->attach($cod[$j]);
            }
            //end possui_ocupacao
          }
      }
      //end nucleo_familiar

      //area propria/arrendada/parceria
      $tem_area_propria = $request->tem_area_propria;
      if($tem_area_propria == "sim"){//verifica se o check box esta marcado
        $propriedade_historico->tem_area_propria = $tem_area_propria;
        $propriedade_historico->area_propria_ha = $request->area_propria_ha;
        $result = $propriedade_historico->save();
      }
      $tem_area_arrendada = $request->tem_area_arrendada;
      if($tem_area_arrendada == "sim"){//verifica se o check box esta marcado
        $propriedade_historico->tem_area_arrendada = $tem_area_arrendada;
        $propriedade_historico->area_arrendada_ha = $request->area_arrendada_ha;
        $result = $propriedade_historico->save();
      }
      $tem_area_parceria = $request->tem_area_parceria;
      if($tem_area_parceria == "sim"){//verifica se o check box esta marcado
        $propriedade_historico->tem_area_parceria = $tem_area_parceria;
        $propriedade_historico->area_parceria_ha = $request->area_parceria_ha;
        $result = $propriedade_historico->save();
      }

      $propriedade_historico->area_total = ($request->area_propria_ha + $request->area_arrendada_ha + $request->area_parceria_ha);//calcula area total
      $result = $propriedade_historico->save();
      //end area propria/arrendada/parceria

      //mao familiar(tem, num,)
      $propriedade_historico->tem_mao_familiar = $request->tem_mao_familiar;
      $propriedade_historico->num_mao_familiar = $request->num_mao_familiar;
      $result = $propriedade_historico->save();
      //end mao familiar(tem, num, )

      //mao diarista(tem, sim, meses)
      $propriedade_historico->tem_mao_diarista = $request->tem_mao_diarista;
      $propriedade_historico->num_mao_diarista = $request->num_mao_diarista;
      $result = $propriedade_historico->save();

      $nMesesDiarista = $request->num_mao_diarista;
      for($i = 0; $i < $nMesesDiarista; $i ++){
          $mes = $request->mesesDiarista[$i];
          $propriedade_historico->$mes = 'sim';
          $result = $propriedade_historico->save();
      }
      //end mao diarista(tem, sim, meses)

      //mao contratada(tem, sim, meses)
      $propriedade_historico->tem_mao_contratada = $request->tem_mao_contratada;
      $propriedade_historico->num_mao_contrata = $request->num_mao_contratada;
      $result = $propriedade_historico->save();

      $nMesesContratada = $request->num_mao_contratada;
      for($i = 0; $i < $nMesesContratada; $i ++){
          $mes = $request->mesesContratada[$i];
          $propriedade_historico->$mes = 'sim';
          $result = $propriedade_historico->save();
      }
      //end mao contratada(tem, sim, meses)

      //atividades em ordem de importancia
      $nImportancia = count($request->importancia);
      for($i = 0; $i < $nImportancia; $i ++){
          $importancia = ($i + 1);
          if($request->importancia[$i] != 'null'){
            //insert tabela pivot possui_ativ
            $result = $propriedade_historico->atividade()
                  ->attach($propriedade->cod_prop,
                        array('cod_ativ' =>$request->importancia[$i], 'datas' => $datas, 'importancia' => $importancia));
          }
      }
      //end atividades em ordem de importancia

      //ano iniciou olericultura/fruticulturas
        $propriedade_historico->ano_iniciou_oleri = $request->ano_iniciou_oleri;
        $propriedade_historico->ano_iniciou_fruti = $request->ano_iniciou_fruti;
      //end ano iniciou olericultura/fruticultura

      //percentual fruti/oleri na renda
      if($request->percent_fruti_renda != 'null'){
        $propriedade_historico->percent_fruti_renda = $request->percent_fruti_renda;
        $result = $propriedade_historico->save();
      }
      if($request->percent_oleri_renda != 'null'){
          $propriedade_historico->percent_oler_renda = $request->percent_oleri_renda;
          $result = $propriedade_historico->save();
      }
      //end percentual fruti/oleri na renda

      //motivacoes
      $nMotivacoes = count($request->motivacoes);
      for($i = 0; $i < $nMotivacoes; $i ++){
        if($request->motivacoes[$i] != 'null'){
          //insert tabela pivot tem_motivacao
          $result = $propriedade_historico->motivacao()
              ->attach($propriedade->cod_prop,
                  array('cod_motiv' => $request->motivacoes[$i], 'datas' => $datas));
        }
      }
      $propriedade_historico->obs7 = $request->obs7;
      $result = $propriedade_historico->save();
      //end motivacoes

      //incentivo em ordem de importancia
      $nIncentivos = count($request->incentivo);
      for($i = 0; $i < $nIncentivos; $i ++){
          $incentivo = ($i + 1);
          if($request->incentivo[$i] != 'null'){
            //insert tabela pivot possui_ativ
            $result = $propriedade_historico->apoio()
                  ->attach($propriedade->cod_prop,
                      array('cod_apoio' =>$request->incentivo[$i], 'datas' => $datas, 'importancia' => $incentivo));
          }
      }
      $propriedade_historico->obs8 = $request->obs8;
      $result = $propriedade_historico->save();
      //end incentivo em ordem de importancia

      //cultivo
      $nCultivos = count($request->cultivo);
      for($i = 0; $i < $nCultivos; $i ++){
        if($request->cultivo[$i] != 'null'){
          //insert tabela pivot tem_cultivo
          $result = $propriedade_historico->cultivo()
              ->attach($propriedade->cod_prop,
                  array('cod_cult' => $request->cultivo[$i], 'datas' => $datas));
        }
      }
      //end cultivo

      //pulverizador
      $nPulverizadores = count($request->pulverizador);
      for($i = 0; $i < $nPulverizadores; $i ++){
        if($request->pulverizador[$i] != 'null'){
          //insert tabela pivot possui_pulverizador
          $result = $propriedade_historico->pulverizador()
              ->attach($propriedade->cod_prop,
                  array('cod_pulv' => $request->pulverizador[$i], 'datas' => $datas));
        }
      }
      //end pulverizador

      //tracao
      $nTracoes = count($request->tracao);
      for($i = 0; $i < $nTracoes; $i ++){
        if($request->tracao[$i] != 'null'){
          //insert tabela pivot possui_tracao
          $result = $propriedade_historico->tracao()
              ->attach($propriedade->cod_prop,
                  array('cod_tracao' => $request->tracao[$i], 'datas' => $datas));
        }
      }
      //end tracao

      //adubos
      $nAdubos = count($request->adubo);
      for($i = 0; $i < $nAdubos; $i ++){
        if($request->adubo[$i] != 'null'){
          //insert tabela pivot tem_adubo
          $result = $propriedade_historico->adubo()
              ->attach($propriedade->cod_prop,
                  array('cod_adubo' => $request->adubo[$i], 'datas' => $datas));
        }
      }
      //end adubo

      //irrigacao
      $nIrrigacoes = count($request->irrigacao);
      for($i = 0; $i < $nIrrigacoes; $i ++){
        if($request->irrigacao[$i] != 'null'){
          //insert tabela pivot possui_irrigacao
          $result = $propriedade_historico->irrigacao()
              ->attach($propriedade->cod_prop,
                  array('cod_irrigacao' => $request->irrigacao[$i], 'datas' => $datas));
        }
      }
      //end irrigacao

      //plasticultura
      $nPlasticulturas = count($request->plasticultura);
      for($i = 0; $i < $nPlasticulturas; $i ++){
        if($request->plasticultura[$i] != 'null'){
          if($request->plasticultura[$i] == 4){
            //insert tabela pivot possui_plasticultura
            $result = $propriedade_historico->plasticultura()
                ->attach($propriedade->cod_prop,
                    array('cod_plastic' => $request->plasticultura[$i], 'datas' => $datas, 'descricao' => $request->OutrosPlasticultura));
          }else{
            //insert tabela pivot possui_plasticultura
            $result = $propriedade_historico->plasticultura()
                ->attach($propriedade->cod_prop,
                    array('cod_plastic' => $request->plasticultura[$i], 'datas' => $datas));
          }
        }
      }
      //end plasticultura

      //agua
      $nAguas = count($request->agua);
      for($i = 0; $i < $nAguas; $i ++){
        if($request->agua[$i] != 'null'){
          //insert tabela pivot possui_agua
          $result = $propriedade_historico->agua()
              ->attach($propriedade->cod_prop,
                  array('cod_agua' => $request->agua[$i], 'datas' => $datas));
        }
      }
      //end agua

      //grau de producao(convencional - organica)
      if($request->grau_conv_organica != 'null'){
        $propriedade_historico->grau_conv_organica = $request->grau_conv_organica;
        $result = $propriedade_historico->save();
      }//end grau de producao(convencional - organica)

      //problemas
      $nProblemas = count($request->problemas);
      for($i = 0; $i < $nProblemas; $i ++){
        if($request->problemas[$i] != 'null'){
          if($request->problemas[$i] == 11){
            //insert tabela pivot tem_problemas
            $result = $propriedade_historico->problemas()
                ->attach($propriedade->cod_prop,
                    array('cod_problema' => $request->problemas[$i], 'datas' => $datas, 'descricao_problema' => $request->OutrosProblemas));
          }else{
            //insert tabela pivot tem_problemas
            $result = $propriedade_historico->problemas()
                ->attach($propriedade->cod_prop,
                    array('cod_problema' => $request->problemas[$i], 'datas' => $datas));
          }
        }
      }
      //end problemas

      //pragas e doenças
      $nPragas_doencas = count($request->pragas_doencas);
      for($i = 0; $i < $nPragas_doencas; $i ++){
        if($request->pragas_doencas[$i] == 'quimico'){
          $propriedade_historico->controle_quimico = 'sim';
          $result = $propriedade_historico->save();
        }
        if($request->pragas_doencas[$i] == 'integrado'){
          $propriedade_historico->controle_integrado = 'sim';
          $result = $propriedade_historico->save();
        }
        if($request->pragas_doencas[$i] == 'organico'){
          $propriedade_historico->controle_organico = 'sim';
          $result = $propriedade_historico->save();
        }
      }
      //end pragas e doenças

      //producao
      $nTipo = count($request->id_tipo);
      for ($i=0; $i < $nTipo ; $i++) {

            if(($request->id_tipo[$i] != 'null') && ($request->id_cultura[$i] != 'null') ){

              $producao = new Producao();
              $producao->cod_prop = $propriedade_historico->cod_prop;
              $producao->datas = $datas;

              $producao->cod_cultura = $request->id_cultura[$i];
              $producao->tipo = $request->id_tipo[$i];

              if($request->id_cultivar[$i] != 'null'){
                $producao->cod_cultivar_cultura = $request->id_cultivar[$i];
              }

              $producao->ano_implant = $request->ano_implant[$i];
              $producao->num_plantas = $request->num_plantas[$i];
              $producao->area_ha_m = $request->area_ha_m[$i];

              if($request->unidade[$i] != 'null'){
                $producao->unidade = $request->unidade[$i];
              }

              $producao->num_safras = $request->num_safras[$i];
              $producao->quant_prod = $request->quant_prod[$i];

              if($request->unidade_quant_prod[$i] != 'null'){
                  $producao->unidade_quant_prod = $request->unidade_quant_prod[$i];
              }

              if($request->producao_suficiente[$i] != 'null'){
                  $producao->producao_suficiente = $request->producao_suficiente[$i];
              }

              if($request->intencao_ampliar[$i] != 'null'){
                  $producao->intencao_ampliar = $request->intencao_ampliar[$i];
              }

              $result = $producao->save();
            }
      }//end producao

      //ampliacao
      $nAmpliacao = count($request->ampliacao);
      for ($i=0; $i < $nAmpliacao ; $i++) {
        $result = $propriedade_historico->ampliacao()
            ->attach($propriedade->cod_prop,
                array('cod_cultura' => $request->ampliacao[$i], 'datas' => $datas));
      }
      //end ampliacao

      //mercados
      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 1, 'datas' => $datas, 'percentual' => $request->feira_livre_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 1, 'datas' => $datas, 'percentual' => $request->feira_livre_horti, 'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 2, 'datas' => $datas, 'percentual' => $request->cooperativa_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 2, 'datas' => $datas, 'percentual' => $request->cooperativa_horti, 'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 3, 'datas' => $datas, 'percentual' => $request->mercado_escolar_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 3, 'datas' => $datas, 'percentual' => $request->mercado_escolar_horti,'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 4, 'datas' => $datas, 'percentual' => $request->mercado_PAA_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 4, 'datas' => $datas, 'percentual' => $request->mercado_PAA_horti, 'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 5, 'datas' => $datas, 'percentual' => $request->comercio_prop_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 5, 'datas' => $datas, 'percentual' => $request->comercio_prop_horti, 'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 6, 'datas' => $datas, 'percentual' => $request->vendas_domicilio_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 6, 'datas' => $datas, 'percentual' => $request->vendas_domicilio_horti, 'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 7, 'datas' => $datas, 'percentual' => $request->comercio_medio_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 7, 'datas' => $datas, 'percentual' => $request->comercio_medio_horti, 'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 8, 'datas' => $datas, 'percentual' => $request->supermercados_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 8, 'datas' => $datas, 'percentual' => $request->supermercados_horti, 'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 9, 'datas' => $datas, 'percentual' => $request->restaurantes_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 9, 'datas' => $datas, 'percentual' => $request->restaurantes_horti, 'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 10, 'datas' => $datas, 'percentual' => $request->padaria_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 10, 'datas' => $datas, 'percentual' => $request->padaria_horti, 'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 11, 'datas' => $datas, 'percentual' => $request->na_propriedade_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 11, 'datas' => $datas, 'percentual' => $request->na_propriedade_horti, 'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 12, 'datas' => $datas, 'percentual' => $request->agroindustrias_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 12, 'datas' => $datas, 'percentual' => $request->agroindustrias_horti, 'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 13, 'datas' => $datas, 'percentual' => $request->na_estrada_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 13, 'datas' => $datas, 'percentual' => $request->na_estrada_horti, 'frutaouhortalica' => 2));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 14, 'datas' => $datas, 'percentual' => $request->outros_fruti, 'frutaouhortalica' => 1));

      $result = $propriedade_historico->destino()
            ->attach($propriedade->cod_prop,
                array('cod_destino' => 14, 'datas' => $datas, 'percentual' => $request->outros_horti, 'frutaouhortalica' => 2));

      $propriedade_historico->obs12 = $request->obs_mercados;
      $result = $propriedade_historico->save();

      DB::commit(); //commit no banco de dados

      $countPropSantiago = DB::table('propriedade')->where('cod_municipio', '=', 2)->count();
      $countPropSantamaria = DB::table('propriedade')->where('cod_municipio', '=', 1)->count();

      if($result){
        $alterado = 'true';
        $showCod_prop = $propriedade->cod_prop;

        return view('dashboard')
                ->with('alterado', $alterado)
                ->with('cod_prop', $showCod_prop)
                ->with('countPropSantiago', $countPropSantiago)
                ->with('countPropSantamaria', $countPropSantamaria);;
      }
      else{
        $error = 'true';
          return view('form_cadastro')
                  ->with('error', $error);
      }

    }//end else

  }//end editar propriedade


}
