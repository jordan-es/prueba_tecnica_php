<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelicula extends Model
{
        public $incrementing = false;
       protected $primaryKey = 'cod_pelicula';


            public function scopeBuscarpor($query, $tipo, $buscar)
           {
           	if(($tipo) && ($buscar)){
           		return $query->where($tipo,'like',"%$buscar%");
           	}
           }
}
