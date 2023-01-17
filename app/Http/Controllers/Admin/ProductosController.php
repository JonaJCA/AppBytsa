<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Categoria;
use App\Modelos\Unidad;
use App\Modelos\Producto;
use Illuminate\Support\Facades\DB;


class ProductosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $categorias = Categoria::all();
        $unids = Unidad::all();
        return view ('admin.productos.index', compact('categorias', 'unids'));
    }

    public function productoxcategoria($categoriaId){
       /** $consulta = DB::table('categorias')
            ->join('productos', 'categorias.id', '=', 'productos.cate_id')            
            ->select('productos.nombre_produ', 'productos.caracteristica_produ', 'productos.marca_producto','productos.costo_producto', 'productos.cate_id')->where('cate_id', '=', $categoriaId)
            ->get();       */
            //return $consulta;

            /**$cate=Categoria::find($categoriaId);
            $producto=Producto::all();
            return $cate; */
            $consulta = Categoria::with('productos')->findOrFail($categoriaId);       
       return view ('admin.productos.reportes.productoxcategoria', compact('consulta'));
            //return $consulta;
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $newProducto = new Producto();
        $newProducto->nombre_produ = $request->nombre_produ;
        $newProducto->caracteristica_produ = $request->caracteristica_produ;
        $newProducto->marca_producto = $request->marca_producto;
        $newProducto->costo_producto = $request->costo_producto;
        $newProducto->cate_id = $request->cate_id;
        $newProducto->uni_id = $request->uni_id;
        $newProducto->save();

        return redirect ('admin/productos/listar');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
       $productos = Producto::all();
       $cate = Categoria::all();
       $produd_und = Unidad::all();
        return view ('admin.productos.listar', ['productos' => $productos], compact('cate', 'produd_und'));
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
    public function update(Request $request, $productoId)
    {
        $cate = Categoria::all();
        $unids = Unidad::all();
        $producto = Producto::find($productoId);

        $producto->nombre_produ = $request->nombre_produ;
        $producto->caracteristica_produ = $request->caracteristica_produ;
        $producto->marca_producto = $request->marca_producto;
        $producto->costo_producto = $request->costo_producto;
        $producto->cate_id = $request->cate_id;
        $producto->uni_id = $request->uni_id;
        $producto->save();

        return redirect ('admin/productos/listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $productoId)
    {
        $producto = Producto::find($productoId);

        $producto->nombre_produ = $request->nombre_produ;
        $producto->caracteristica_produ = $request->caracteristica_produ;
        $producto->marca_producto = $request->marca_producto;
        $producto->costo_producto = $request->costo_producto;
        $producto->cate_id = $request->cate_id;
        $producto->uni_id = $request->uni_id;
        $producto->delete();

        return redirect()->back()->with('Eliminar', 'ok');
    }
}
