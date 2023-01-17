@extends('adminlte::page')

@section('title', 'Proveedores')
@section('css')
  

@stop


@section('content_header')
	<h1>
    Listado de Proveedores
    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="location.href='../proveedores'">Registrar nuevo</button>    
</h1>
@endsection

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Relación de Proveedores</h3>
                        <a href="" type="submit" style="position: absolute; top: 3px; right: 20px; cursor: pointer; outline: none;" class="btn btn-primary btn-sm">Listado PDF</a>
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <table id="proveedores" class="table table-bordered table-striped display responsive no-wrap" width="100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Razón Social</th>
                                    <th>RUC</th>
                                    <th>Cta Bancaria</th>                         
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $proveedor)
                                <tr>
                                    <td>PR-0{{$proveedor->id}}</td>
                                    <td>{{$proveedor->razon_social}}</td>
                                    <td>{{$proveedor->docu_provee}}</td>
                                    <td>{{$proveedor->cuenta1_provee}}</td>                            
                                    <td class="btn-group">
                                    <button type="button" class="btn btn-info redondo mr-3"
                                         onclick='Swal.fire({
                                          title:"<h3><b>Consulta Datos</b></h3>", 
                                          html:`<div class="box-body col-md-12" style="zoom: 95%;">
                                                  <div class="form-group table-responsive" style="font-size: 15px;">
                                                    <center>
                                                      <table class="table table-bordered table-striped">
                                                        <tr>
                                                          <td><h4><b>Razón Social:</b></h4></td>
                                                          <td>{{$proveedor->razon_social}}</td>
                                                        </tr>
                                                        <tr>
                                                          <td><h4><b>Tipo Documento:</b></h4></td>
                                                          <td>{{$proveedor->tipodocu_provee}}</td>
                                                        </tr>
                                                        <tr>
                                                          <td><h4><b>Numero Documento:</b></h4></td>
                                                          <td>{{$proveedor->docu_provee}}</td>
                                                        </tr>
                                                        <tr>
                                                          <td><h4><b>Contacto:</b></h4></td>
                                                          <td>{{$proveedor->contacto_provee}}</td>
                                                        </tr>
                                                        <tr>
                                                          <td><h4><b>Nº Teléfono:</b></h4></td>
                                                          <td>{{$proveedor->telefono_provee}}</td>
                                                        </tr>
                                                        <tr>
                                                          <td><h4><b>Nº Cuenta Bancaria:</b></h4></td>
                                                          <td>{{$proveedor->cuenta1_provee}}</td>
                                                        </tr>
                                                        <tr>
                                                          <td><h4><b>Email:</b></h4></td>
                                                          <td>{{$proveedor->email_provee}}</td>
                                                        </tr>
                                                        <tr>
                                                          <td><h4><b>Referencia:</b></h4></td>
                                                          <td>{{$proveedor->referencia_provee}}</td>
                                                        </tr>
                                                      </table>                                  
                                                    </center>
                                                  </div>
                                                </div>`, 
                                          showCloseButton:true, focusConfirm:false, showConfirmButton:false, width: "80%"
                                        })'
                                        ><i class="fas fa-solid fa-eye"></i>
                                    </button>

                                        <button type="button" class="btn btn-warning mr-3" data-toggle="modal" data-target="#modal-update-proveedor-{{$proveedor->id}}" m>
                                        <i class="fas fa-solid fa-pen"></i>
                                        </button>
                                        <form action="{{route('admin.proveedores.destroy', $proveedor->id)}}" method="POST" class="form-eliminar">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>  
                                 <!--modal Actualización-->
                                    @include('admin.proveedores.modal-update-proveedor') 
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
            $('#proveedores').DataTable( {
                "order": [[ 1, "desc" ]],
                responsive: true,
                "language": {
              	"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
           		},   		
            });
        });
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