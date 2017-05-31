<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apoio extends Model {

	protected $table = 'apoio';

	protected $primaryKey = 'cod_apoio';

	public $timestamps = false;

	protected $fillable = array(
        'tipo_apoio'
  );

  public function propriedade_historico(){
		return $this->belongsToMany('App\Propriedade_historico', 'possui_apoio', 'cod_apoio', 'cod_prop')->withPivot('datas', 'importancia');
	}

}
