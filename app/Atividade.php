<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model {

	protected $table = 'atividade';

	protected $primaryKey = 'cod_ativ';

	public $timestamps = false;

	protected $fillable = array(
        'descricao'
  );

  public function propriedade_historico(){
    return $this->belongsToMany('App\propriedade_historico', 'possui_ativ', 'cod_ativ', 'cod_prop')->withPivot('datas', 'importancia');
  }


}
