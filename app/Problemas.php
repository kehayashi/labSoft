<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problemas extends Model {

	protected $table = 'problemas';

	protected $primaryKey = 'cod_problema';

	public $timestamps = false;

	protected $fillable = array(
        'tipo_problema'
  );

	public function propriedade_historico(){
		return $this->belongsToMany('App\Propriedade_historico', 'tem_problemas', 'cod_problema', 'cod_prop')->withPivot('datas', 'descricao_problema');
	}

}
