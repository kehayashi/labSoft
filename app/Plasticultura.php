<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plasticultura extends Model {

	protected $table = 'plasticultura';

	protected $primaryKey = 'cod_plastic';

	public $timestamps = false;

	protected $fillable = array(
        'tipo_plastic'
  );

  public function propriedade_historico(){
		return $this->belongsToMany('App\Propriedade_historico', 'possui_plasticultura', 'cod_plastic', 'cod_prop')->withPivot('datas', 'descricao');
	}

}
