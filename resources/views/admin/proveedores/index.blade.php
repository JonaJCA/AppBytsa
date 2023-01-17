@extends('adminlte::page')

@section('title', '::Registro de Proveedores::')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
	<center>
		<h1>
	    Panel de Registro de Proveedores
	    </h1>
    </center>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registro de Proveedores</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="proveedores" class="table table-bordered table-striped">
                    <tbody>
                       <form action="{{ route('admin.proveedores.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body row" >
                                <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                    <label for="razon_social">Razón Social</label>
                                    <input type="text" name="razon_social" id="razon_social" class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                    <label for="tipodocu_provee">Tipo de Documento</label>
                                    <select name="tipodocu_provee" id="tipodocu_provee" class="form-control">
                                        <option selected>Elija tipo</option>
                                        <option value="RUC">RUC</option>
                                        <option value="DNI">DNI</option>
                                    </select>
                                </div>
                                <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                    <label for="docu_provee">Nº Documento</label>
                                    <input type="text" name="docu_provee" id="docu_provee" minlength="8" maxlength="11" class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                    <label for="contacto_provee">Contacto</label>
                                    <input type="text" name="contacto_provee" id="contacto_provee"  class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                    <label for="telefono_provee">Nº Teléfono</label>
                                    <input type="text" name="telefono_provee" id="telefono_provee" maxlength="9" class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                    <label for="tipo_provee">Tipo Proveedor</label>
                                    <select name="tipo_provee" id="tipo_provee" class="form-control">
                                        <option selected>Elija tipo</option>
                                        <option value="1">Productos</option>
                                        <option value="2">Servicios</option>
                                    </select>
                                </div>
                                <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                    <label for="activi_provee">Actividad</label>
                                    <input type="text" name="activi_provee" id="activi_provee"  class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-4 col-sm-12 col-xs-12">
                                    <label for="cuenta1_provee">Nº Cta. Bancaria</label>
                                    <input type="text" name="cuenta1_provee" id="cuenta1_provee" class="form-control " required/>
                                </div>    
                                <div class="class form-group col-md-4 col-sm-12 col-xs-12">
                                    <label for="cuenta2_provee">Nº Cta. Bancaria 2</label>
                                    <input type="text" name="cuenta2_provee" id="cuenta2_provee" class="form-control"/>
                                </div>                             
                                <div class="class form-group col-md-4 col-sm-12 col-xs-12">
                                    <label for="email_provee">Correo Electrónico</label>
                                    <input type="email" name="email_provee" id="email_provee" class="form-control" required/>
                                </div>
                                <div class="class form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="referencia_provee">Referencia</label>
                                    <textarea class="form-control" id="referencia_provee" name="referencia_provee" rows="3"></textarea>
                                </div>
                                <div class="class form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="direccion_provee">Dirección</label>
                                    <input type="text" name="direccion_provee" id="direccion_provee" class="form-control" required>
                                </div>                                
                                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                    <label>Departamento</label>
                                    <select name="depar_id" class="form-control" id="_departamento">
                                    <option value="">Seleccionar..</option>
                                    @foreach($departamentos as $item)
                                    <option value="{{$item->id}}">{{$item->nombre_depa}}</option>
                                    @endforeach
                                    </select>                                    
                                </div>
                                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                    <label>Provincia</label>
                                    <select name="provin_id" class="form-control" id="_provincia">
                                    </select>                                                                        
                                </div>
                                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                    <label>Distrito</label>
                                    <select name="distrito_id" class="form-control" id="_distrito">
                                    </select>
                                    
                                    
                                </div>

                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn btn-outline-primary">Guardar</button>
                                <button type="reset" class="btn btn-outline-warning">Limpiar</button>
                            </div>
                        </form>            
                    </tbody>      
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

@endsection

@section('js')
<script>
      const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('_departamento').addEventListener('change',(e)=>{
        fetch('provincias',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json()
        }).then( data =>{
            var opciones ="<option value=''>Elegir</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].nombre_provi+'</option>';
            }
            document.getElementById("_provincia").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })

    document.getElementById('_provincia').addEventListener('change',(e)=>{
        fetch('distritos',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json()
        }).then( data =>{
            var opciones ="<option value=''>Elegir</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].nombre_dist+'</option>';
            }
            document.getElementById("_distrito").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })

  </script>
@stop