<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model {

	protected $table = 'municipio';

	protected $primaryKey = 'cod_municipio';

	public $timestamps = false;

	protected $fillable = array(
				'nome_municipio'
  );

  public function propriedade(){
    return $this->hasMany('App\Propriedade');
  }

  public function distrito(){
    return $this->hasMany('App\Distrito');
  }

  public function localidade(){
    return $this->hasMany('App\Localidade');
  }

}
