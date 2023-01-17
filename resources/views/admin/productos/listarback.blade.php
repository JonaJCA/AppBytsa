@extends('adminlte::page')

@section('title', 'Productos')
@section('css')
    
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
@stop

 <script type="text/javascript">
    function imprimir_reporte_cate(){
      for (var i = 0 ; i < cate_id.length; i++) {
         cate_id[i].addEventListener('change' , imprimir_reporte_cate , false ) ; 
      }
      var select_option_cate = document.getElementById("cate_id").value;
      var select_cate = document.getElementById("cate_id");

      if(select_option_cate=="Seleccione para exportar.." || select_option_cate=="" || select_option_cate=="[object%20HTMLSelectElement]"){
      } else { 
        window.open(select_option_cate,"_blank");
        select_cate.selectedIndex=0;

      }
    }
  </script>

@section('content_header')
	<h1>
    Listado de Productos
    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="location.href='../productos'">Registrar nuevo</button>    
    </h1>
@endsection

@section('content')
	<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Productos</h3>
                    
                    <input type="text" name="produ" placeholder="Busqueda de productos.." class="form-control col-md-3 col-sm-12 col-xs-12" data-show-subtext="true" data-live-search="true" style="position: absolute; top: 3px; right: 350px"/>
                    
                    <select onChange="imprimir_reporte_cate();" for="cate_id" name="cate_id" id="cate_id" class="form-control col-md-3 col-sm-12 col-xs-12" data-show-subtext="true" data-live-search="true" style="position: absolute; top: 3px; right: 20px">   
                        <option class='btn-danger' value="Seleccione para exportar..">Seleccione para exportar..</option>
                                    @foreach($cate as $catego)                                               
                                       <option class="btn-primary" value="reports/{{$catego->id}}">
                                       {{$catego->id}} - {{$catego->nombre_cate}}
                                       </option>
                                    @endforeach
                    </select> 
                </div>
            <!-- /.card-header -->
            <div class="card-body" >
                <table id="productos" class="table table-bordered table-striped display responsive no-wrap" width="100%" style="zoom: 90%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Caracteristica</th>
                            <th>Marca</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Actualizado al</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <tr>
                            <td>PRO-{{$producto->id}}</td>
                            <td>{{$producto->nombre_produ}}</td>
                            <td>{{$producto->caracteristica_produ}}</td>
                            <td>{{$producto->marca_producto}}</td>
                            <td>S/ {{$producto->costo_producto}}</td>
                            <td>{{$producto->cate->nombre_cate}}</td>
                            <td>{{$producto->updated_at}}</td>
                            <td class="btn-group"><button type="button" class="btn btn-warning mr-3" data-toggle="modal" data-target="#modal-update-category-{{$producto->id}}">
                             Editar
                             </button>
                             <form action="{{route('admin.productos.delete', $producto->id)}}" method="POST" class="form-eliminar">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger">Eliminar</button>
                             </form>
                            </td>
                        </tr>  
                         <!--modal Actualización-->
                            @include('admin.productos.modal-update-producto') 
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.js"></script>
<script src="//cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        $('#productos').DataTable( {
                "lengthMenu":[[5,10,50,-1],[5,10,50, "All"]],
        "order": [[ 0, "desc" ]],
        "responsive": true,
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
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