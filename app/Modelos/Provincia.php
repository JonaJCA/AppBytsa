<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    
    public $timestamps = false;
    protected $fillable = [
        'nombre_provi',
        'departamento_id'
    ];

    public function departamento(){
        return $this->belongsTo("App\Modelos\Departamento");
    }

    public function distrito(){
        return $this->hasMany("App\Modelos\Distrito");
    }

}
