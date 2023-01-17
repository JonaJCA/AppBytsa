<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function cate(){
        return $this->belongsTo('App\Modelos\Categoria', 'cate_id');
        

    }

    public function produd_und(){
        return $this->belongsTo('App\Modelos\Unidad', 'uni_id');
    }

    

}
