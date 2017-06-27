<?php

namespace App\Http\Controllers;

use Request;
use App\Propriedade;
use App\Propriedade_historico;
use DB;
use Auth;
use Excel;

Class RelatorioController extends Controller {

  //buscar dados propriedade
  /*public function gerarRelatorio(){
    if(Auth::user() == null){ //verifica se tem sessao do usuario
      return view('index');
    }
    else{

      $arrayExcel = array();

      $propriedades = DB::select("SELECT cod_prop, ST_AsText(coordenada_geo) FROM propriedade");

      foreach ($propriedades as $p) {
        echo 'cod_prop: '.$p->cod_prop.'<br>';


        //separar latitude e longitude
        $pontoGPS = $p->st_astext;
		    $string = (string) $pontoGPS;
        $array = (explode("(", $string));
	      $string2 = $array[1];
	      $array2 = (explode(" ", $string2));
	      $longitude= $array2[0];
	      $string3 = $array2[1];
	      $array3 = (explode(")", $string3));
	      $latitude = $array3[0];
        //end separar latitude e longitude

        echo 'latitude: '.$latitude.'<br>';
        echo 'longitude: '.$longitude.'<br>';


        //quantidade_nucleo
        $quantidade_nucleo = DB::select(
          "SELECT count(*) FROM propriedade, propriedade_historico,possui_nucleo, nucleo_familiar
        			WHERE propriedade.cod_prop = propriedade_historico.cod_prop
								 AND possui_nucleo.cod_prop = propriedade_historico.cod_prop
										AND possui_nucleo.cod_nucleo = nucleo_familiar.cod_nucleo
											 AND propriedade.cod_prop = $p->cod_prop");

        foreach ($quantidade_nucleo as $qn) {
            echo 'quantidade nucleo familiar: '.$qn->count.'<br>';
        }//end foreach quantidade_nucleo

        //idade_responsavel
        $idade_responsavel = DB::select(
          "SELECT (date_part('year',age(dt_nasc))) AS idade_prop
             FROM propriedade, propriedade_historico, possui_nucleo, nucleo_familiar
       		 		 WHERE propriedade.cod_prop = propriedade_historico.cod_prop
								 AND possui_nucleo.cod_prop = propriedade_historico.cod_prop
									 AND possui_nucleo.cod_nucleo = nucleo_familiar.cod_nucleo
										 AND nucleo_familiar.cod_parentesco = 1
											 AND propriedade.cod_prop = $p->cod_prop");

        foreach ($idade_responsavel as $idade) {
            echo 'media de idade do resposavel: '.$idade->idade_prop.'<br>';
        }//end foreach idade_responsavel


        //media idade nucleo_familiar
        $media_idade = DB::select(
          "SELECT avg(date_part('year',age(dt_nasc))) AS media_idade_familia
             FROM propriedade,propriedade_historico,possui_nucleo,nucleo_familiar
        				WHERE propriedade.cod_prop = propriedade_historico.cod_prop
								   AND possui_nucleo.cod_prop = propriedade_historico.cod_prop
										  AND possui_nucleo.cod_nucleo = nucleo_familiar.cod_nucleo
										     AND propriedade.cod_prop = $p->cod_prop");

        foreach ($media_idade as $media) {
            $media_idade_nucleo = number_format($media->media_idade_familia,2,",",".");
            echo 'media de idade do nucleo_familiar: '.$media_idade_nucleo.'<br>';
        }//end foreach media idade nucleo_familiar


        //quantidade de mulheres no nucleo_familiar
        $quantidade_mulheres = DB::select(
          "SELECT count(*)
              FROM municipio, nucleo_familiar, possui_nucleo, propriedade_historico, propriedade, parentesco
                 WHERE propriedade.cod_prop = propriedade_historico.cod_prop
                    AND propriedade_historico.cod_prop = possui_nucleo.cod_prop
                       AND possui_nucleo.cod_nucleo = nucleo_familiar.cod_nucleo
                          AND nucleo_familiar.cod_parentesco = parentesco.cod_parentesco
                             AND municipio.cod_municipio = propriedade.cod_municipio
                                AND sexo = 'F'
                                	 AND propriedade_historico.cod_prop = $p->cod_prop");

        foreach ($quantidade_mulheres as $qm) {
            echo 'quantidade de mulheres no nucleo familiar: '.$qm->count.'<br>';
        }
        //end quantidade de mulheres no nucleo_familiar

        //quantidade de homens no nucleo_familiar
        $quantidade_homens = DB::select(
          "SELECT count(*)
              FROM municipio, nucleo_familiar, possui_nucleo, propriedade_historico, propriedade, parentesco
                 WHERE propriedade.cod_prop = propriedade_historico.cod_prop
                    AND propriedade_historico.cod_prop = possui_nucleo.cod_prop
                       AND possui_nucleo.cod_nucleo = nucleo_familiar.cod_nucleo
                          AND nucleo_familiar.cod_parentesco = parentesco.cod_parentesco
                             AND municipio.cod_municipio = propriedade.cod_municipio
                                AND sexo = 'M'
                               	  AND propriedade_historico.cod_prop = $p->cod_prop");

        foreach ($quantidade_homens as $qh) {
            echo 'quantidade de homens no nucleo familiar: '.$qh->count.'<br>';
        }
        //end quantidade de homens no nucleo_familiar

        //grau convergencia organica
        $grau_convergencia_organica = DB::select(
          "SELECT grau_conv_organica
              FROM propriedade_historico
                  WHERE propriedade_historico.cod_prop = $p->cod_prop");

        foreach ($grau_convergencia_organica as $g) {
            echo 'grau convergencia organica: '.$g->grau_conv_organica.'<br>';
        }
        //end grau convergencia organica

        //motivacoes
        $motivacoes = DB::select(
          "SELECT *
              FROM motivacao
                 ORDER BY cod_motiv");

        foreach ($motivacoes as $motiv) {
            echo $motiv->nome_motivacao.' :';

            $cont = DB::select(
              "SELECT count(*)
                  FROM propriedade_historico, motivacao, tem_motivacao
									   WHERE propriedade_historico.cod_prop = tem_motivacao.cod_prop
										    AND tem_motivacao.cod_motiv = motivacao.cod_motiv
											     AND propriedade_historico.cod_prop = $p->cod_prop
												      AND motivacao.cod_motiv = $motiv->cod_motiv");

            if($cont[0]->count != 0){
                echo 'sim<br>';
                $resposta = 'sim';

            }
            else{
                echo 'nao<br>';
                $resposta = 'nao';
            }

        }//end foreach motivacoes
        //end motivacoes

        //mercados
        $mercados = DB::select(
          "SELECT *
              FROM destino
                ORDER BY cod_destino");

        foreach ($mercados as $mer) {
            echo $mer->tipo_destino.' :';

            $cont2 = DB::select(
              "SELECT count(*)
                  FROM dest_producao
                    WHERE cod_destino = $mer->cod_destino
                        AND cod_prop = $p->cod_prop");

            if($cont2[0]->count != 0){
                echo 'sim<br>';
            }
            else{
                echo 'nao<br>';
            }
        }//end foreach motivacoes

        echo '<br>';
      }//end foreach propriedades

    }//end else

  }//end gerarRelatorio*/

  public function info(){
    if(Auth::user() == null){ //verifica se tem sessao do usuario
      return view('index');
    }
    else{
      return view('info_relatorios');
    }
  }


  public function donwloadRelatorio(){
    if(Auth::user() == null){ //verifica se tem sessao do usuario
      return view('index');
    }
    else{
      Excel::create('Dados propriedades', function($excel) {

        $excel->sheet('informacoes', function($sheet) {

            $propriedade_historico = Propriedade_historico::all();
            $sheet->fromArray($propriedade_historico);
            //$sheet->setOrientation('landscape');

        });

      })->export('xls');
    }
  }//end testeExcel


}
