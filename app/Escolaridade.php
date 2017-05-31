<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escolaridade extends Model {

	protected $table = 'escolaridade';

	protected $primaryKey = 'cod_parantesco';

	public $timestamps = false;

	protected $fillable = array(
        'escolaridade'
  );

  public function nucleo_familiar(){
    return $this->belongsToMany('App\Nucleo_familiar');
  }

}
