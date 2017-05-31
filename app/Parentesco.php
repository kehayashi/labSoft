<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model {

	protected $table = 'parentesco';

	protected $primaryKey = 'cod_parantesco';

	public $timestamps = false;

	protected $fillable = array(
        'parantesco'
  );

  public function nucleo_familiar(){
    return $this->belongsToMany('App\Nucleo_familiar');
  }

}
