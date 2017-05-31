<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracao extends Model {

	protected $table = 'tracao';

	protected $primaryKey = 'cod_tracao';

	public $timestamps = false;

	protected $fillable = array(
        'nome_tracao'
  );

  public function propriedade_historico(){
		return $this->belongsToMany('App\Propriedade_historico', 'possui_tracao', 'cod_tracao', 'cod_prop')->withPivot('datas');
	}

}
