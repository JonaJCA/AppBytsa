<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    
    public $timestamps = false;
    protected $fillable = [
        'nombre_depa',
    ];

    public function provincia(){
        return $this->hasMany("App\Modelos\Provincia");
    }
}
