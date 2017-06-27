<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producao extends Model {

	protected $table = 'producao';

	protected $primaryKey = 'cod_prod';

	public $timestamps = false;

	protected $fillable = array(
				'cod_cultura',
        'cod_prop',
        'datas',
        'cod_cultivar_cultura',
        'tipo',
        'area_ha_m',
        'quant_prod',
        'unidade_quant_prod',
        'num_plantas',
        'ano_implant',
        'num_safras',
        'producao_suficiente',
        'intencao_ampliar'
  );

  public function propriedade_historico(){
    return $this->hasOne('App\Propriedade_historico');
  }

  public function cultura(){
    return $this->hasOne('App\Cultura');
  }

  public function cultivar_cultura(){
    return $this->hasOne('App\Cultura');
  }


}
