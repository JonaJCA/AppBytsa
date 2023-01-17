<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
   
    public $timestamps = false;
    protected $fillable = [
        'nombre_dist',
        'provincia_id'
    ];

    public function provincia(){
        return $this->belongsTo("App\Modelos\Provincia");
    }
}
