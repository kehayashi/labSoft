<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propriedade extends Model {

	protected $table = 'propriedade';

	protected $primaryKey = 'cod_prop';

	public $timestamps = false;

	protected $fillable = array(
				'cod_municipio',
				'cod_distrito',
				'cod_local',
				'coordenada_geo'
  );


  public function municipio(){
    return $this->belongsTo('App\Municipio');
  }

  public function distrito(){
    return $this->hasOne('App\Distrito');
  }

  public function localidade(){
    return $this->hasOne('App\Localidade');
  }

  public function propriedade_historico(){
    return $this->hasMany('App\Propriedade_historico');
  }


}
