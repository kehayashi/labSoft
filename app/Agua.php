<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agua extends Model {

	protected $table = 'agua';

	protected $primaryKey = 'cod_agua';

	public $timestamps = false;

	protected $fillable = array(
        'tipo_agua'
  );

  public function propriedade_historico(){
		return $this->belongsToMany('App\Propriedade_historico', 'tem_agua', 'cod_agua', 'cod_prop')->withPivot('datas');
	}

}
