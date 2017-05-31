<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propriedade_historico extends Model {

	protected $table = 'propriedade_historico';

	protected $primaryKey = 'cod_prop';

	public $incrementing = false;

	public $timestamps = false;

	protected $fillable = array(
        'cod_prop',
        'datas',
				'data_ultima_alteração',
				'telefone',
				'nome_cadastrador',
				'tem_area_propria',
				'area_propria_ha',
				'tem_area_arrendada',
				'area_arrendada_ha'.
				'tem_area_parceria',
				'area_parceria_ha',
				'area_total',
				'tem_mao_familiar',
				'tem_mao_diarista',
				'tem_mao_contratada',
				'num_mao_familiar',
				'num_mao_diarista',
				'num_mao_contrata',
				'percent_fruti_renda',
				'percent_oler_renda',
				'ano_iniciou_oleri',
				'ano_iniciou_fruti'
  );

  public function propriedade(){
    return $this->belongsTo('App\Propriedade');
  }

	public function nucleo_familiar(){
    return $this->belongsToMany('App\Propriedade', 'possui_nucleo', 'cod_nucleo', 'cod_prop')->withPivot('datas');
  }

	public function atividade(){
		return $this->belongsToMany('App\Atividade', 'possui_ativ', 'cod_ativ', 'cod_prop')->withPivot('datas', 'importancia');
	}

	public function apoio(){
		return $this->belongsToMany('App\Apoio', 'possui_apoio', 'cod_apoio', 'cod_prop')->withPivot('datas', 'importancia');
	}

	public function problemas(){
		return $this->belongsToMany('App\Problemas', 'tem_problemas', 'cod_problema', 'cod_prop')->withPivot('datas', 'descricao_problema');
	}

	public function motivacao(){
		return $this->belongsToMany('App\Motivacao', 'tem_motivacao', 'cod_motiv', 'cod_prop')->withPivot('datas');
	}

	public function cultivo(){
		return $this->belongsToMany('App\Cultivo', 'tem_cultivo', 'cod_cult', 'cod_prop')->withPivot('datas');
	}

	public function irrigacao(){
		return $this->belongsToMany('App\Irrigacao', 'possui_irrigacao', 'cod_irrigacao', 'cod_prop')->withPivot('datas');
	}

	public function pulverizador(){
		return $this->belongsToMany('App\Pulverizador', 'possui_pulverizador', 'cod_pulv', 'cod_prop')->withPivot('datas');
	}

	public function tracao(){
		return $this->belongsToMany('App\Tracao', 'possui_tracao', 'cod_tracao', 'cod_prop')->withPivot('datas');
	}

	public function plasticultura(){
		return $this->belongsToMany('App\Plasticultura', 'possui_plasticultura', 'cod_plastic', 'cod_prop')->withPivot('datas', 'descricao');
	}

	public function adubo(){
		return $this->belongsToMany('App\Adubo', 'tem_adubo', 'cod_adubo', 'cod_prop')->withPivot('datas');
	}

	public function agua(){
		return $this->belongsToMany('App\Agua', 'tem_agua', 'cod_agua', 'cod_prop')->withPivot('datas');
	}



}
