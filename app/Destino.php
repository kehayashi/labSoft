<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model {

	protected $table = 'destino';

	protected $primaryKey = 'cod_destino';

	public $timestamps = false;

	protected $fillable = array(
        'tipo_destino'
  );

  public function propriedade_historico(){
		return $this->belongsToMany('App\Propriedade_historico', 'dest_producao', 'cod_destino', 'cod_prop')->withPivot('datas', 'percentual', 'frutaouhortalica');
	}
	

}
