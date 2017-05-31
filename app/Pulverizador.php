<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pulverizador extends Model {

	protected $table = 'pulverizador';

	protected $primaryKey = 'cod_pulv';

	public $timestamps = false;

	protected $fillable = array(
        'tipo_pulv'
  );

  public function propriedade_historico(){
		return $this->belongsToMany('App\Propriedade_historico', 'possui_pulverizador', 'cod_pulv', 'cod_prop')->withPivot('datas');
	}

}
