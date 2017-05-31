<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nucleo_familiar extends Model {

	protected $table = 'nucleo_familiar';

	protected $primaryKey = 'cod_nucleo';

	public $timestamps = false;

	protected $fillable = array(
        'cod_parantesco',
        'cod_escolaridade',
				'sexo',
				'nome',
				'dt_nasc'
  );

  public function propriedade_historico(){
    return $this->belongsToMany('App\Propriedade', 'possui_nucleo', 'cod_nucleo', 'cod_prop')->withPivot('datas');
  }

  public function parentesco(){
    return $this->hasOne('App\Parentesco');
  }

  public function escolaridade(){
    return $this->hasOne('App\escolaridade');
  }

  public function ocupacao(){
    return $this->belongsToMany('App\Ocupacao', 'possui_ocupacao', 'cod_nucleo', 'cod_ocupacao');
  }

}
