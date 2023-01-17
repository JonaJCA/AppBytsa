<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Departamento;
use App\Modelos\Provincia;
use App\Modelos\Distrito;

class DireccionController extends Controller
{
   public function index(){
        $departamentos = Departamento::all();
        return view("admin.colaboradores.index",compact("departamentos"));

    }

   public function provincias(Request $request){
        if(isset($request->texto)){
            $provincias = Provincia::whereDepartamento_id($request->texto)->get();
            return response()->json(
                [
                    'lista' => $provincias,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        }

    }

    public function distritos(Request $request){
        if(isset($request->texto)){
            $distritos = Distrito::whereProvincia_id($request->texto)->get();
            return response()->json(
                [
                    'lista' => $distritos,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        }

    }

    
}
