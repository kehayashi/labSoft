<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Irrigacao extends Model {

	protected $table = 'irrigacao';

	protected $primaryKey = 'cod_irrigacao';

	public $timestamps = false;

	protected $fillable = array(
        'tipo_irrigacao'
  );

  public function propriedade_historico(){
		return $this->belongsToMany('App\Propriedade_historico', 'possui_irrigacao', 'cod_irrigacao', 'cod_prop')->withPivot('datas');
	}

}
