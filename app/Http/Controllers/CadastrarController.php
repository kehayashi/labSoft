<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LeadController;
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
use App\Http\Requests\CadastroRequest;
use DB;

Class CadastrarController extends Controller {

  public function dashboard(){
    return view('dashboard');
  }

  public function editar(){
    return view('lista_propriedades');
  }

  public function form(){
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

    return view('form__cadastro')
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
            ->with('agua', $agua);
   }

  //cadastrar propriedade
  public function cadastrarFormulario(CadastroRequest $request){
    date_default_timezone_set('America/Sao_Paulo');
		$data_ultima_alteracao = date('Y-m-d H:i:s');

    DB::beginTransaction();

    //propriedade
    $pontoGPS = $request->longitude." ".$request->latitude;
    $propriedade = new Propriedade();
    $propriedade->cod_municipio = $request->cod_municipio;
    $propriedade->cod_distrito = $request->cod_distrito;
    $propriedade->cod_local = $request->cod_local;
    $propriedade->coordenada_geo = DB::raw("ST_GeomFromText('POINT($pontoGPS)', 4674)");//salva pronto GPS
    $propriedade->save();
    //end propriedade

    //propriedade_historico
    $propriedade_historico = new Propriedade_historico();
    $propriedade_historico->cod_prop = $propriedade->cod_prop;
    $date = date_create($request->datas);
    $datas = date_format($date, 'Y-m-d');//cria data no formato para inserir no banco
    $propriedade_historico->datas = $datas;
    $propriedade_historico->data_ultima_alteracao = $data_ultima_alteracao;
    $telefone = strtr($request->telefone, array('(' => '', ')' => '', ' ' => '', '-' => '' ));//tira caracteres para inserir no banco
    $propriedade_historico->telefone = $telefone;
    $propriedade_historico->nome_cadastrador = $request->nome_cadastrador;
    $propriedade_historico->save();
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
          $nucleo_familiar->propriedade_historico()
                ->attach($propriedade->cod_prop, array('cod_nucleo' => $nucleo_familiar->cod_nucleo, 'datas' => $datas) );
          //end possui_nucleo

          //insert tabela pivot possui_ocupacao
          $k = $i+1;
          $cod_ocupacao = 'cod_ocupacao'.$k;
          $nOcupacao = count($request->$cod_ocupacao);
          $cod = $request->$cod_ocupacao;
          for ($j=0; $j < $nOcupacao; $j++) {
              //insert tabela pivor possui_ocupacao
              $nucleo_familiar->ocupacao()->attach($cod[$j]);
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
      $propriedade_historico->save();
    }
    $tem_area_arrendada = $request->tem_area_arrendada;
    if($tem_area_arrendada == "sim"){//verifica se o check box esta marcado
      $propriedade_historico->tem_area_arrendada = $tem_area_arrendada;
      $propriedade_historico->area_arrendada_ha = $request->area_arrendada_ha;
      $propriedade_historico->save();
    }
    $tem_area_parceria = $request->tem_area_parceria;
    if($tem_area_parceria == "sim"){//verifica se o check box esta marcado
      $propriedade_historico->tem_area_parceria = $tem_area_parceria;
      $propriedade_historico->area_parceria_ha = $request->area_parceria_ha;
      $propriedade_historico->save();
    }

    $propriedade_historico->area_total = ($request->area_propria_ha + $request->area_arrendada_ha + $request->area_parceria_ha);//calcula area total
    $propriedade_historico->save();
    //end area propria/arrendada/parceria

    //mao familiar(tem, num,)
    $propriedade_historico->tem_mao_familiar = $request->tem_mao_familiar;
    $propriedade_historico->num_mao_familiar = $request->num_mao_familiar;
    $propriedade_historico->save();
    //end mao familiar(tem, num, )

    //mao diarista(tem, sim, meses)
    $propriedade_historico->tem_mao_diarista = $request->tem_mao_diarista;
    $propriedade_historico->num_mao_diarista = $request->num_mao_diarista;
    $propriedade_historico->save();

    $nMesesDiarista = $request->num_mao_diarista;
    for($i = 0; $i < $nMesesDiarista; $i ++){
        $mes = $request->mesesDiarista[$i];
        $propriedade_historico->$mes = 'sim';
        $propriedade_historico->save();
    }
    //end mao diarista(tem, sim, meses)

    //mao contratada(tem, sim, meses)
    $propriedade_historico->tem_mao_contratada = $request->tem_mao_contratada;
    $propriedade_historico->num_mao_contrata = $request->num_mao_contratada;
    $propriedade_historico->save();

    $nMesesContratada = $request->num_mao_contratada;
    for($i = 0; $i < $nMesesContratada; $i ++){
        $mes = $request->mesesContratada[$i];
        $propriedade_historico->$mes = 'sim';
        $propriedade_historico->save();
    }
    //end mao contratada(tem, sim, meses)

    //atividades em ordem de importancia
    $nImportancia = count($request->importancia);
    for($i = 0; $i < $nImportancia; $i ++){
        $importancia = ($i + 1);
        if($request->importancia[$i] != 'null'){
          //insert tabela pivot possui_ativ
          $propriedade_historico->atividade()
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
      $propriedade_historico->save();
    }
    if($request->percent_oleri_renda != 'null'){
        $propriedade_historico->percent_oler_renda = $request->percent_oleri_renda;
        $propriedade_historico->save();
    }
    //end percentual fruti/oleri na renda

    //motivacoes
    $nMotivacoes = count($request->motivacoes);
    for($i = 0; $i < $nMotivacoes; $i ++){
      if($request->motivacoes[$i] != 'null'){
        //insert tabela pivot tem_motivacao
        $propriedade_historico->motivacao()
            ->attach($propriedade->cod_prop, array('cod_motiv' => $request->motivacoes[$i], 'datas' => $datas));
      }
    }
    $propriedade_historico->obs7 = $request->obs7;
    $propriedade_historico->save();
    //end motivacoes

    //incentivo em ordem de importancia
    $nIncentivos = count($request->incentivo);
    for($i = 0; $i < $nIncentivos; $i ++){
        $incentivo = ($i + 1);
        if($request->incentivo[$i] != 'null'){
          //insert tabela pivot possui_ativ
          $propriedade_historico->apoio()
                ->attach($propriedade->cod_prop,
                      array('cod_apoio' =>$request->incentivo[$i], 'datas' => $datas, 'importancia' => $incentivo));
        }
    }
    $propriedade_historico->obs8 = $request->obs8;
    $propriedade_historico->save();
    //end incentivo em ordem de importancia

    //cultivo
    $nCultivos = count($request->cultivo);
    for($i = 0; $i < $nCultivos; $i ++){
      if($request->cultivo[$i] != 'null'){
        //insert tabela pivot tem_cultivo
        $propriedade_historico->cultivo()
            ->attach($propriedade->cod_prop, array('cod_cult' => $request->cultivo[$i], 'datas' => $datas));
      }
    }
    //end cultivo

    //pulverizador
    $nPulverizadores = count($request->pulverizador);
    for($i = 0; $i < $nPulverizadores; $i ++){
      if($request->pulverizador[$i] != 'null'){
        //insert tabela pivot possui_pulverizador
        $propriedade_historico->pulverizador()
            ->attach($propriedade->cod_prop, array('cod_pulv' => $request->pulverizador[$i], 'datas' => $datas));
      }
    }
    //end pulverizador

    //tracao
    $nTracoes = count($request->tracao);
    for($i = 0; $i < $nTracoes; $i ++){
      if($request->tracao[$i] != 'null'){
        //insert tabela pivot possui_tracao
        $propriedade_historico->tracao()
            ->attach($propriedade->cod_prop, array('cod_tracao' => $request->tracao[$i], 'datas' => $datas));
      }
    }
    //end tracao

    //adubos
    $nAdubos = count($request->adubo);
    for($i = 0; $i < $nAdubos; $i ++){
      if($request->adubo[$i] != 'null'){
        //insert tabela pivot tem_adubo
        $propriedade_historico->adubo()
            ->attach($propriedade->cod_prop, array('cod_adubo' => $request->adubo[$i], 'datas' => $datas));
      }
    }
    //end adubo

    //irrigacao
    $nIrrigacoes = count($request->irrigacao);
    for($i = 0; $i < $nIrrigacoes; $i ++){
      if($request->irrigacao[$i] != 'null'){
        //insert tabela pivot possui_irrigacao
        $propriedade_historico->irrigacao()
            ->attach($propriedade->cod_prop, array('cod_irrigacao' => $request->irrigacao[$i], 'datas' => $datas));
      }
    }
    //end irrigacao

    //plasticultura
    $nPlasticulturas = count($request->plasticultura);
    for($i = 0; $i < $nPlasticulturas; $i ++){
      if($request->plasticultura[$i] != 'null'){
        if($request->plasticultura[$i] == 4){
          //insert tabela pivot possui_plasticultura
          $propriedade_historico->plasticultura()
              ->attach($propriedade->cod_prop, array('cod_plastic' => $request->plasticultura[$i], 'datas' => $datas, 'descricao' => $request->OutrosPlasticultura));
        }else{
          //insert tabela pivot possui_plasticultura
          $propriedade_historico->plasticultura()
              ->attach($propriedade->cod_prop, array('cod_plastic' => $request->plasticultura[$i], 'datas' => $datas));
        }
      }
    }
    //end plasticultura

    //agua
    $nAguas = count($request->agua);
    for($i = 0; $i < $nAguas; $i ++){
      if($request->agua[$i] != 'null'){
        //insert tabela pivot possui_agua
        $propriedade_historico->agua()
            ->attach($propriedade->cod_prop, array('cod_agua' => $request->agua[$i], 'datas' => $datas));
      }
    }
    //end agua

    //grau de producao(convencional - organica)
    if($request->grau_conv_organica != 'null'){
      $propriedade_historico->grau_conv_organica = $request->grau_conv_organica;
      $propriedade_historico->save();
    }//end grau de producao(convencional - organica)

    //problemas
    $nProblemas = count($request->problemas);
    for($i = 0; $i < $nProblemas; $i ++){
      if($request->problemas[$i] != 'null'){
        if($request->problemas[$i] == 11){
          //insert tabela pivot tem_problemas
          $propriedade_historico->problemas()
              ->attach($propriedade->cod_prop, array('cod_problema' => $request->problemas[$i], 'datas' => $datas, 'descricao_problema' => $request->OutrosProblemas));
        }else{
          //insert tabela pivot tem_problemas
          $propriedade_historico->problemas()
              ->attach($propriedade->cod_prop, array('cod_problema' => $request->problemas[$i], 'datas' => $datas));
        }
      }
    }
    //end problemas

    //pragas e doenças
    $nPragas_doencas = count($request->pragas_doencas);
    for($i = 0; $i < $nPragas_doencas; $i ++){
      if($request->pragas_doencas[$i] == 'quimico'){
        $propriedade_historico->controle_quimico = 'sim';
        $propriedade_historico->save();
      }
      if($request->pragas_doencas[$i] == 'integrado'){
        $propriedade_historico->controle_integrado = 'sim';
        $propriedade_historico->save();
      }
      if($request->pragas_doencas[$i] == 'organico'){
        $propriedade_historico->controle_organico = 'sim';
        $propriedade_historico->save();
      }
    }
    //end pragas e doenças

    try{
      DB::commit();//encerra transacao no banco de dados

      $cadastrado = 'true';
      $showCod_prop = $propriedade_historico->cod_prop;

      return view('dashboard')
              ->with('cadastrado', $cadastrado)
              ->with('cod_prop', $showCod_prop);
    }
    catch(Exception $e){
      return view('form__cadastro');
    }

  }//end cadastrar propriedade

  //ajax
  public function listaMunicipios(){
  		header('Content-Type: application/json');

  		$municipios = Municipio::all();

  		echo json_encode($municipios);
  }//end ajax

  //ajax
  public function listaDistritos(){
		header('Content-Type: application/json');

    $cod_municipio = Request::query('cod_municipio');

    $distritos = DB::table('municipio')
  					->join('distrito', 'municipio.cod_municipio', '=', 'distrito.cod_municipio')
            ->where('distrito.cod_municipio', '=', $cod_municipio)
  					->select('distrito.*')
  					->get();

		echo json_encode($distritos);
	}//end ajax

  //ajax
  public function listaLocalidades(){
		header('Content-Type: application/json');

    $cod_municipio = Request::query('cod_municipio');

    $localidades = DB::table('municipio')
  					->join('localidade', 'municipio.cod_municipio', '=', 'localidade.cod_municipio')
            ->where('localidade.cod_municipio', '=', $cod_municipio)
  					->select('localidade.*')
  					->get();

		echo json_encode($localidades);
	}//end ajax

}
