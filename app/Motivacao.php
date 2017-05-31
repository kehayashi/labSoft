<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivacao extends Model {

	protected $table = 'motivacao';

	protected $primaryKey = 'cod_motiv';

	public $timestamps = false;

	protected $fillable = array(
        'nome_motivacao'
  );

  public function propriedade_historico(){
		return $this->belongsToMany('App\Propriedade_historico', 'tem_motivacao', 'cod_motiv', 'cod_prop')->withPivot('datas');
	}

}
