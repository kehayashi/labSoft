<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupacao extends Model {

	protected $table = 'ocupacao';

	protected $primaryKey = 'cod_ocupacao';

	public $timestamps = false;

	protected $fillable = array(
        'ocupacao'
  );

  public function nucleo_familiar(){
    return $this->belongsToMany('App\Nucleo_familiar', 'possui_ocupacao', 'cod_nucleo', 'cod_ocupacao');
  }

}
