<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model {

	protected $table = 'cultivo';

	protected $primaryKey = 'cod_cultivo';

	public $timestamps = false;

	protected $fillable = array(
        'nome_cult'
  );

  public function propriedade_historico(){
		return $this->belongsToMany('App\Propriedade_historico', 'tem_cultivo', 'cod_cult', 'cod_prop')->withPivot('datas');
	}

}
