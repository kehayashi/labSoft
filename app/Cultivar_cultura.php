<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivar_cultura extends Model {

	protected $table = 'cultivar_cultura';

	protected $primaryKey = 'cod_cultivar_cultura';

	public $timestamps = false;

	protected $fillable = array(
        'nome_cultivar_cultura',
        'cod_cultura'
  );

  public function cultura(){
		return $this->belongsTo('App\Cultura');
	}

	public function Producao(){
		return $this->hasMany('App\Producao');
	}

}
