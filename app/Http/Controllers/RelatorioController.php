<?php

namespace App\Http\Controllers;

use Request;
use App\Propriedade;
use App\Propriedade_historico;
use DB;
use Auth;
use Excel;

Class RelatorioController extends Controller {

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
    }//end else
  }//end download relatorio

}
