<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'razon_social', 'tipodocu_provee', 'docu_provee', 'contacto_provee', 'direccion_provee', 'telefono_provee', 'tipo_provee', 'cuenta1_provee', 'cuenta2_provee', 'email_provee', 'activi_provee', 'referencia_provee', 'depar_id', 'provin_id', 'distrito_id' 
    ];
}
