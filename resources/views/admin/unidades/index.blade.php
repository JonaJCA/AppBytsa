@extends('adminlte::page')

@section('title', 'Unidades')
@section('css')
    
	
@stop


@section('content_header')
	<h1>
    Listado de Unidades
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
        Crear
    </button>
</h1>
@endsection

@section('content')
	<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de unidades</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="unidades" class="table table-bordered table-striped display" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Abreviatura</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unidads as $unidad)
                        <tr>
                            <td>{{$unidad->id}}</td>
                            <td>{{$unidad->nombre_und}}</td>
                            <td>{{$unidad->abreviatura_und}}</td>
                            <td class="btn-group">
                            <button type="button" class="btn btn-info redondo mr-3"
                                 onclick='Swal.fire({
                                  title:"<h3><b>Consulta Unidad</b></h3>", 
                                  html:`<div class="box-body col-md-12" style="zoom: 95%;">
                                          <div class="form-group table-responsive" style="font-size: 15px;">
                                            <center>
                                              <table class="table table-bordered table-striped">
                                                <tr>
                                                  <td><h4><b>ID</b></h4></td>
                                                  <td>{{$unidad->id}}</td>
                                                </tr>
                                                <tr>
                                                  <td><h4><b>Descripción</b></h4></td>
                                                  <td>{{$unidad->nombre_und}}</td>
                                                </tr>
                                                <tr>
                                                  <td><h4><b>Abreviatura</b></h4></td>
                                                  <td>{{$unidad->abreviatura_und}}</td>
                                                </tr>
                                              </table>                                  
                                            </center>
                                          </div>
                                        </div>`, 
                                  showCloseButton:true, focusConfirm:false, showConfirmButton:false, width: "80%"
                                })'
                                ><i class="fas fa-solid fa-eye"></i>
                            </button>
                             <button type="button" class="btn btn-warning mr-3" data-toggle="modal" data-target="#modal-update-category-{{$unidad->id}}">
                             <i class="fas fa-solid fa-pen"></i>
                             </button>
                             <form action="{{route('admin.unidades.delete', $unidad->id)}}" class="form-eliminas" method="POST">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                             </form>
                            </td>
                        </tr>   
                            <!-- modal Actualización-->
                            @include('admin.unidades.modal-update-unidad')
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

<!-- modal -->
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Unidad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
	        <form action="{{ route('admin.unidades.store')}}" method="POST">
	        	{{ csrf_field() }}
	            <div class="modal-body">
	                <div class="class form-group">
	                	<label for="unidad">Nombre</label>
	                	<input type="text" name="unidad" id="unidad" class="form-control" required>
	                </div>
	            </div>
                <div class="modal-body">
                    <div class="class form-group">
                        <label for="abreviatura_und">Abreviatura</label>
                        <input type="text" name="abreviatura_und" id="abreviatura_und" class="form-control" required>
                    </div>
                </div>
	            <div class="modal-footer justify-content-between">
	                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
	                <button type="submit" class="btn btn-outline-primary">Guardar</button>
	            </div>
	        </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@section('js')
   <script>
$(document).ready(function() {
    $('#unidades').DataTable( {
        "lengthMenu":[[5,10,50,-1],[5,10,50, "All"]],
        "order": [[ 1, "desc" ]],
        "scrollX": true,
        "language": {
      	"url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
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

    $('.form-eliminas').submit(function(e){
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