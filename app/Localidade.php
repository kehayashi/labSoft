<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidade extends Model {

	protected $table = 'localidade';

	protected $primaryKey = 'cod_local';

	public $timestamps = false;

	protected $fillable = array(
        'cod_municipio',
        'nome_local'
  );

  public function propriedade(){
    return $this->hasMany('App\Propriedade');
  }

  public function municipio(){
    return $this->belongsTo('App\Municipio');
  }

}
