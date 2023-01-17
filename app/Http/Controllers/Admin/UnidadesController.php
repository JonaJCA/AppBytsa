<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Unidad;

class UnidadesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $unidades = Unidad::all();
        return view ('admin.unidades.index', ['unidads' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUnidad = new Unidad();
        $newUnidad->nombre_und = $request->unidad;
        $newUnidad->abreviatura_und = $request->abreviatura_und;
        $newUnidad->save();

        return redirect()->back();
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $unidadId)
    {
        $unidad = Unidad::find($unidadId);

        $unidad->nombre_und = $request->unidad;
        $unidad->abreviatura_und = $request->abreviatura_und;
        $unidad->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $unidadId)
    {
        $unidad = Unidad::find($unidadId);

        $unidad->nombre_und = $request->unidad;
        $unidad->abreviatura_und = $request->abreviatura_und;
        $unidad->delete();

        return redirect()->back()->with('Eliminar', 'ok');
    }
}
