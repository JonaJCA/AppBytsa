<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Factura;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::all();
        return view ('admin.facturas.index', ['facturas' => $facturas]);
        
    }

    public function mostrarInfo(){
        $facturas = Factura::all();
        return view ('infobra', compact("facturas"));
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

        Factura::create($entrada);
            

        return redirect ('admin/facturas/listar');
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
    public function update(Request $request, $facturaId)
    {
       $facturas=Factura::findOrFail($facturaId);
         $entrada=$request->all();

         $facturas->update($entrada);
            

        return redirect ('admin/facturas/listar' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($facturaId)
    {
        $facturas=Factura::findOrFail($facturaId);
        $facturas->delete();
        
        return redirect()->back()->with('Eliminar', 'ok');
    }

    public function listar()
    {
       $facturas = Factura::all();
        return view ('admin.facturas.listar', ['facturas' => $facturas]);
    }
}
