<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = [
        'num_fact','fecha_fact', 'descripcion_fact', 'sub_total', 'igv_fact', 'total_fact', 'detraccion', 'fondo_garantia', 'depositado', 'estado', 'fecha_presenta' 
    ];
}
