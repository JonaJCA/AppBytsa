<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Proveedor;
use App\Modelos\Departamento;
use App\Modelos\Provincia;
use App\Modelos\Distrito;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $proveedores = Proveedor::all();
       $departamentos = Departamento::all();
        $provincias = Provincia::all();
        return view ('admin.proveedores.index', ['proveedores' => $proveedores], compact("departamentos"), compact("provincias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrada=$request->all();

        Proveedor::create($entrada);
            

        return redirect ('admin/proveedores/listar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $proveedorId)
    {
        $proveedores=Proveedor::findOrFail($proveedorId);
         $entrada=$request->all();

         $proveedores->update($entrada);
            

        return redirect ('admin/proveedores/listar' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($proveedorId)
    {
        $proveedores=Proveedor::findOrFail($proveedorId);
        $proveedores->delete();
        
        return redirect()->back()->with('Eliminar', 'ok');
    }

    public function listar()
    {
       $proveedores = Proveedor::all();
        return view ('admin.proveedores.listar', ['proveedores' => $proveedores]);
    }
}
