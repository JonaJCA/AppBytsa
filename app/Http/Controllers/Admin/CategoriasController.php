<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Categoria;


class CategoriasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $categorias = Categoria::all();
        return view ('admin.categorias.index', ['categorias' => $categorias]);
    }

    public function store(Request $request){

        $newCategoria = new Categoria();
        $newCategoria->nombre_cate = $request->categoria;
        $newCategoria->save();

        return redirect()->back();

    }

    public function show($categoriaId){
        $categoria = Categoria::findOrFail($categoriaId);
        return view('categorias.show', compact('categoria'));

    }

    public function update(Request $request, $categoriaId){
       
        $categoria = Categoria::find($categoriaId);

        $categoria->nombre_cate = $request->categoria;
        $categoria->save();

        return redirect()->back();

    }

    public function delete(Request $request, $categoriaId){
       
        $categoria = Categoria::find($categoriaId);

        $categoria->nombre_cate = $request->categoria;
        $categoria->delete();

        return redirect()->back()->with('Eliminar','ok');

    }



}
