<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Culturas extends Model {

	protected $table = 'cultura';

	protected $primaryKey = 'cod_cultura';

	public $timestamps = false;

	protected $fillable = array(
        'nome_cultura',
				'classificacao',
				'tipo_cultura',
  );

	public function ampliacao(){
		return $this->belongsToMany('App\Propriedade_historico', 'ampliacao', 'cod_cultura', 'cod_prop')->withPivot('datas');
	}

	public function cultivar_cultura(){
		return $this->hasMany('App\Cultivar_cultura');
	}

	public function producao(){
		return $this->hasMany('App\Producao');
	}

}
