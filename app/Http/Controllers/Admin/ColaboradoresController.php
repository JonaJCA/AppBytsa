<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Modelos\Colaboradores;
use App\Modelos\Foto;
use App\Modelos\Departamento;
use App\Modelos\Provincia;
use App\Modelos\Distrito;

class ColaboradoresController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $colaboradores = Colaboradores::all();
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        return view ('admin.colaboradores.index', ['colaboradores' => $colaboradores], compact("departamentos"), compact("provincias"));
    }

    public function RelaPDF(){
        $colaboradores = Colaboradores::all();
        return view ('admin.colaboradores.reportes.pdf');
    }

    public function fichaPDF($colaboradorId){
        $colaboradores=Colaboradores::find($colaboradorId);
        $fotos=Foto::find($colaboradores->foto_id);
        return view ('admin.colaboradores.reportes.fichapersonal', compact('colaboradores'),compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(Request $request)
    {
      /*  $newColaborador = new Colaboradores();
        $newColaborador->nombre_emple = $request->nombre_emple;
        $newColaborador->apepat_emple = $request->apepat_emple;
        $newColaborador->apemat_emple = $request->apemat_emple;
        $newColaborador->direccion_emple = $request->direccion_emple;
        $newColaborador->docu_emple = $request->docu_emple;
        $newColaborador->telefono_emple = $request->telefono_emple;
        $newColaborador->edad_emple = $request->edad_emple;
        $newColaborador->cuenta_emple = $request->cuenta_emple;
        $newColaborador->email_emple = $request->email_emple;
        $newEmpleado->cate_id = $request->cate_id;
        $newEmpleado->uni_id = $request->uni_id;
        $newColaborador->save();*/

         $entrada=$request->all();

        if($archivo=$request->file('foto_id')){
            $nombre=$archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $foto=Foto::create(['ruta_foto'=>$nombre]);
            $entrada['foto_id']=$foto->id;

        }

            Colaboradores::create($entrada);
            

        return redirect ('admin/colaboradores/listar');
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
    public function update(Request $request, $colaboradorId)
    {
       /* $colaboradores = Colaboradores::find($colaboradorId);

        $colaboradores->nombre_emple = $request->nombre_emple;
        $colaboradores->apepat_emple = $request->apepat_emple;
        $colaboradores->apemat_emple = $request->apemat_emple;
        $colaboradores->direccion_emple = $request->direccion_emple;
        $colaboradores->docu_emple = $request->docu_emple;
        $colaboradores->telefono_emple = $request->telefono_emple;
        $colaboradores->edad_emple = $request->edad_emple;
        $colaboradores->cuenta_emple = $request->cuenta_emple;
        $colaboradores->email_emple = $request->email_emple;
        
        $colaboradores->save();*/
        $colaboradores=Colaboradores::findOrFail($colaboradorId);
         $entrada=$request->all();

        if($archivo=$request->file('foto_id')){
            $nombre=$archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $foto=Foto::create(['ruta_foto'=>$nombre]);
            $entrada['foto_id']=$foto->id;

        }

            $colaboradores->update($entrada);
            

        return redirect ('admin/colaboradores/listar' );
    }

    public function listar()
    {
       $colaboradores = Colaboradores::all();
        return view ('admin.colaboradores.listar', ['colaboradores' => $colaboradores]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($colaboradorId)
    {
        //
        $colaboradores=Colaboradores::findOrFail($colaboradorId);
        $foto=Foto::findOrFail($colaboradores->foto_id);
        $colaboradores->delete();
        $foto->delete();
        return redirect()->back()->with('Eliminar', 'ok');
    }

    public function delete(Request $request, $colaboradorId)
    {
        /*$colaboradores = Colaboradores::find($colaboradorId);

        $colaboradores->nombre_emple = $request->nombre_emple;
        $colaboradores->apepat_emple = $request->apepat_emple;
        $colaboradores->apemat_emple = $request->apemat_emple;
        $colaboradores->direccion_emple = $request->direccion_emple;
        $colaboradores->docu_emple = $request->docu_emple;
        $colaboradores->telefono_emple = $request->telefono_emple;
        $colaboradores->edad_emple = $request->edad_emple;
        $colaboradores->cuenta_emple = $request->cuenta_emple;
        $colaboradores->email_emple = $request->email_emple;
        
        $colaboradores->delete();

        return redirect()->back()->with('Eliminar', 'ok');*/
    }

    public function provincias(Request $request){
        if(isset($request->texto)){
            $provincias = Provincia::where('departamento_id', $request->texto)->get();
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
            $distritos = Distrito::where('provincia_id',$request->texto)->get();
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
