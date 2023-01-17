@extends('adminlte::page')

@section('title', '::Registro de Empleados::')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="shortcut icon" href="{{ asset('./icon/favicon.ico') }}">
@stop

@section('content_header')

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
	<center>
		<h1>
	    Panel de Registro de Colaboradores
	    </h1>
    </center>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registro de Colaboradores</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="colaboradores" class="table table-bordered table-striped">
                    <tbody>
                       <form action="{{ route('admin.colaboradores.create')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body row" >
                                <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                    <label for="nombre_emple">Nombres</label>
                                    <input type="text" name="nombre_emple" id="nombre_emple" class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                    <label for="apepat_emple">Apellido Paterno</label>
                                    <input type="text" name="apepat_emple" id="apepat_emple" class="form-control" required/>
                                </div>
                                <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                    <label for="apemat_emple">Apellido Materno</label>
                                    <input type="text" name="apemat_emple" id="apemat_emple" class="form-control" required>
                                </div>
                                <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                    <label for="docu_emple">Nº Documento de Identidad</label>
                                    <input type="text" name="docu_emple" id="docu_emple" maxlength="8" class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                    <label for="fecna_emple">Fecha Nacimiento</label>
                                    <input type="date" name="fecna_emple" id="fecna_emple" class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-4 col-sm-12 col-xs-12">
                                    <label for="telefono_emple">Nº Teléfono</label>
                                    <input type="text" name="telefono_emple" id="telefono_emple" class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-4 col-sm-12 col-xs-12">
                                    <label for="cuenta_emple">Nº Cta. Bancaria</label>
                                    <input type="text" name="cuenta_emple" id="cuenta_emple" class="form-control " required/>
                                </div>                                
                                <div class="class form-group col-md-4 col-sm-12 col-xs-12">
                                    <label for="email_emple">Correo Electrónico</label>
                                    <input type="email" name="email_emple" id="email_emple" class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="direccion_emple">Dirección</label>
                                    <input type="text" name="direccion_emple" id="direccion_emple" class="form-control" required>
                                </div>   
                                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                    <label>Departamento</label>
                                    <select name="depa_id" class="form-control" id="_departamento">
                                    <option value="">Seleccionar..</option>
                                    @foreach($departamentos as $item)
                                    <option value="{{$item->id}}">{{$item->nombre_depa}}</option>
                                    @endforeach
                                    </select>                                    
                                </div>
                                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                    <label>Provincia</label>
                                    <select name="provi_id" class="form-control" id="_provincia">
                                    </select>                                                                        
                                </div>
                                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                    <label>Distrito</label>
                                    <select name="distri_id" class="form-control" id="_distrito">
                                    </select>
                                    
                                    
                                </div>
                                   
                                                                                               
                                
                                <div class="class form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="foto_id">Foto</label>
                                    <input type="file" name="foto_id" id="foto_id" class="form-control "/>
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