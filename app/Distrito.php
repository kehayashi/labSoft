<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model {

	protected $table = 'distrito';

	protected $primaryKey = 'cod_distrito';

	public $timestamps = false;

	protected $fillable = array(
        'cod_municipio',
        'nome_distrito'
  );

  public function propriedade(){
    return $this->hasMany('App\Propriedade');
  }

  public function municipio(){
    return $this->belongsTo('App\Municipio');
  }

}
