@extends('adminlte::page')

@section('title', 'Categorías')
@section('css')

  
@stop

@section('content_header')
    <h1>
    Listado de Categorías
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href='../categorias'">
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
                    <h3 class="card-title">Listado de Categorías</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="categorias" class="table table-bordered table-striped display" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->nombre_cate}}</td>
                            <td class="btn-group">
                                <button type="button" class="btn btn-info redondo mr-3" data-toggle="modal"
                                 onclick='Swal.fire({
                                  title:"<h3><b>Consulta Categoría</b></h3>", 
                                  html:`<div class="box-body col-md-12" style="zoom: 95%;">
                                          <div class="form-group table-responsive" style="font-size: 15px;">
                                            <center>
                                              <table class="table table-bordered table-striped">
                                                <tr>
                                                  <td><h4><b>ID</b></h4></td>
                                                  <td>{{$categoria->id}}</td>
                                                </tr>
                                                <tr>
                                                  <td><h4><b>Descripción</b></h4></td>
                                                  <td>{{$categoria->nombre_cate}}</td>
                                                </tr>
                                              </table>                                  
                                            </center>
                                          </div>
                                        </div>`, 
                                  showCloseButton:true, focusConfirm:false, showConfirmButton:false, width: "80%"
                                })'
                                ><i class="fas fa-solid fa-eye"></i></button>
                                <button type="button" class="btn btn-warning mr-3" data-toggle="modal" data-target="#modal-update-categoria-{{$categoria->id}}">
                                 <i class="fas fa-solid fa-pen"></i>
                                </button>
                                 <form action="{{route('admin.categorias.delete', $categoria->id)}}" class="form-eliminar" method="POST">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                                 </form>
                            </td>
                        </tr>
                            <!-- modal Actualización-->
                            @include('admin.categorias.modal-update-categoria')
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script> 	

    <script>
        $(document).ready(function() {
            $('#categorias').DataTable( {
                "lengthMenu":[[5,10,50,-1],[5,10,50, "All"]],
                "order": [[ 1, "desc" ]],
                "scrollX": true,
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },          
            } );
        } );
    </script>



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