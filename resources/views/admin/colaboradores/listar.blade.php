@extends('adminlte::page')

@section('title', 'Colaboradores')
@section('css')

@stop


@section('content_header')
	<h1>
    Listado de Colaboradores
    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="location.href='../colaboradores'">Registrar nuevo</button>    
    </h1>
@endsection

@section('content')
	<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Relación de Coladoradores</h3>
                    <a href="{{ route('admin.colaboradores.reportes.pdf')}}" type="submit" style="position: absolute; top: 3px; right: 20px; cursor: pointer; outline: none;" class="btn btn-primary btn-sm">Listado PDF</a> 
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="colaboradores" class="table table-bordered table-striped display responsive no-wrap" width="100%">
                    <thead style="zoom: 80%;">
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Documento</th>
                            <th>Cuenta</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colaboradores as $colaborador)
                        <tr>
                            <td>{{$colaborador->id}}</td>
                            <td>{{$colaborador->nombre_emple}}</td>
                            <td>{{$colaborador->apepat_emple}}</td>
                            <td>{{$colaborador->apemat_emple}}</td>
                            <td>{{$colaborador->docu_emple}}</td>
                            <td>{{$colaborador->cuenta_emple}}</td>
                            @if($colaborador->foto)
                            <td><img src="../../images/{{$colaborador->foto ? $colaborador->foto->ruta_foto : '-' }}" width="35"></td>
                            @else
                            <td><img src="../../images/generico.png" width="35"/></td>
                            @endif
                            <td class="btn-group">
                                <button type="button" class="btn btn-info redondo mr-3"
                                     onclick='Swal.fire({
                                      title:"<h3><b>Consulta Datos</b></h3>", 
                                      html:`<div class="box-body col-md-12" style="zoom: 95%;">
                                              <div class="form-group table-responsive" style="font-size: 15px;">
                                                <center>
                                                  <table class="table table-bordered table-striped">
                                                    <tr>
                                                      <td><h4><b>Foto:</b></h4></td>
                                                      <td><img src="../../images/{{$colaborador->foto ? $colaborador->foto->ruta_foto : "-" }}" width="100"> </td>
                                                    </tr>
                                                    <tr>
                                                      <td><h4><b>Nombres:</b></h4></td>
                                                      <td>{{$colaborador->nombre_emple}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td><h4><b>Apellidos:</b></h4></td>
                                                      <td>{{$colaborador->apepat_emple}} {{$colaborador->apemat_emple}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td><h4><b>Dirección:</b></h4></td>
                                                      <td>{{$colaborador->direccion_emple}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td><h4><b>Nº Documento:</b></h4></td>
                                                      <td>{{$colaborador->docu_emple}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td><h4><b>Nº Teléfono:</b></h4></td>
                                                      <td>{{$colaborador->telefono_emple}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td><h4><b>Nº Cuenta Bancaria:</b></h4></td>
                                                      <td>{{$colaborador->cuenta_emple}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td><h4><b>Email:</b></h4></td>
                                                      <td>{{$colaborador->email_emple}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td><h4><b>Fecha de Nacimiento:</b></h4></td>
                                                      <td>{{$colaborador->fecna_emple}}</td>
                                                    </tr>

                                                  </table> 
                                                  <form action={{route('admin.colaboradores.reportes.fichapersonal', $colaborador->id)}} method="get" target="_blank">
                                                     {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{$colaborador->id}}">
                                                    <button type="submit" formmethod="get" class="btn btn-sm btn-primary no-print android_null"> Ver Ficha Personal 
                                                    </button>
                                                  </form>
                                                  </a>
                                                </center>
                                              </div>
                                            </div>`,
                                      showCloseButton:true, focusConfirm:false, showConfirmButton:false, width: "80%"
                                    })'
                                    ><i class="fas fa-solid fa-eye"></i>
                                </button>

                                <button type="button" class="btn btn-warning mr-3" data-toggle="modal" data-target="#modal-update-colaborador-{{$colaborador->id}}">
                                <i class="fas fa-solid fa-pen"></i>
                                </button>
                                <form action="{{route('admin.colaboradores.destroy', $colaborador->id)}}" method="POST" class="form-eliminar">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>  
                         <!--modal Actualización-->
                            @include('admin.colaboradores.modal-update-colaborador') 
                         <!-- /.modal -->                            
                           
                        @endforeach                     
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
$(document).ready(function() {
    $('#colaboradores').DataTable( {
        "order": [[ 3, "desc" ]],
        responsive: true,
        "language": {
      	"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
   		},   		
    } );
} );


</script> 

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script> 



    
@if(session('eliminar')== 'ok')
    <script>
        Swal.fire(
          'Eliminado!',
          'El registro ha sido eliminado.',
          'Éxito'
        )

    </script>
@endif

<script>

    $('.form-eliminar').submit(function(e){
        e.preventDefault();

    Swal.fire({
      title: 'Estás Seguro?',
      text: "No podrás revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Bórralo!'
    }).then((result) => {
      if (result.isConfirmed) {
        /*Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )*/
        this.submit();
      }
    })
});
</script>

@stop