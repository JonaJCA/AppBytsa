<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table= 'categorias';

    public function productos(){
        
        return $this->hasMany('App\Modelos\Producto', "cate_id", "id")->orderBy('nombre_produ');;

    }
}
