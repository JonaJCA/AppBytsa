<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
   protected $table = 'empresa';

   protected $fillable = [
        'razon_social','ruc_empre', 'cta_cte1', 'cta_detraccion', 'cta_cte2', 'banco_1', 'banco_2', 'cci_cta1', 'cci_cta2', 'ficha_empre', 'asiento', 'direc_fiscal', 'telefono_empre', 'rep_legal', 'dni_repre', 'email_empre' 
    ]; 
}
