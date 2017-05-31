<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adubo extends Model {

	protected $table = 'adubo';

	protected $primaryKey = 'cod_adubo';

	public $timestamps = false;

	protected $fillable = array(
        'nome_adubo'
  );

  public function propriedade_historico(){
		return $this->belongsToMany('App\Propriedade_historico', 'tem_adubo', 'cod_adubo', 'cod_prop')->withPivot('datas');
	}

}
