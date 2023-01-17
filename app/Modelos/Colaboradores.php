<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Colaboradores extends Model
{
    protected $fillable = [
        'nombre_emple', 'apepat_emple', 'apemat_emple', 'direccion_emple', 'docu_emple', 'telefono_emple', 'fecna_emple', 'cuenta_emple', 'email_emple','depa_id', 'provi_id', 'distri_id', 'foto_id' 
    ];

    public function foto(){
        return $this->belongsTo('App\Modelos\Foto');

    }
}
