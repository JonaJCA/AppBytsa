@extends('adminlte::page')

@section('title', 'Productos')
@section('css')

  
@stop


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
                        <h3 class="card-title">Relación de Productos</h3><br> 
                        <hr>
                        <select onChange="imprimir_reporte_cate();" for="cate_id" name="cate_id" id="cate_id"  class="form-control col-md-3 col-sm-6 col-xs-6">   
                            <option class='btn-danger' value="Seleccione para exportar..">Seleccione para exportar..</option>
                                @foreach($cate as $catego)                                               
                                    <option class="btn-primary" value="{{route( 'admin.productos.reportes.productoxcategoria', ['categoriaId' => $catego->id])}}">
                                    {{$catego->id}} - {{$catego->nombre_cate}}
                                    </option>
                                @endforeach
                        </select> 
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <table id="productos" class="table table-bordered table-striped display" width="100%">
                            <thead style="zoom: 80%;">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Caracteristica</th>
                                    <th>Precio</th>
                                    <th>Categoría</th>
                                    <th>Actualizado al</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($productos as $producto)
                                <tr>
                                    <td>PROD-{{$producto->id}}</td>
                                    <td>{{$producto->nombre_produ}}</td>
                                    <td>{{$producto->caracteristica_produ}}</td>
                                    <td>S/ {{$producto->costo_producto}}</td>
                                    <td>{{$producto->cate->nombre_cate}}</td>
                                    <td>{{$producto->updated_at}}</td>                           
                                    <td class="btn-group">
                                        <button type="button" class="btn btn-info redondo mr-3" onclick='Swal.fire({
                                      title:"<h3><b>Consulta Detalles</b></h3>", 
                                      html:`<div class="box-body col-md-12" style="zoom: 95%;">
                                              <div class="form-group table-responsive" style="font-size: 15px;">
                                                <center>
                                                  <table class="table table-bordered table-striped">
                                                    <tr>
                                                      <td><h4><b>Descripción:</b></h4></td>
                                                      <td>{{$producto->nombre_produ}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td><h4><b>Caracteristica:</b></h4></td>
                                                      <td>{{$producto->caracteristica_produ}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td><h4><b>Marca:</b></h4></td>
                                                      <td>{{$producto->marca_producto}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td><h4><b>Costo sin igv:</b></h4></td>
                                                      <td>{{$producto->costo_producto}}</td>
                                                    </tr>
                                                    <tr>
                                                      <td><h4><b>Categoria:</b></h4></td>
                                                      <td>{{$producto->cate->nombre_cate}}</td>
                                                    </tr>                            
                                                  </table>                                                  
                                                </center>
                                              </div>
                                            </div>`,
                                      showCloseButton:true, focusConfirm:false, showConfirmButton:false, width: "100%"
                                    })'
                                    ><i class="fas fa-solid fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning mr-3" data-toggle="modal" data-target="#modal-update-producto-{{$producto->id}}">
                                         <i class="fas fa-solid fa-pen"></i>
                                        </button>
                                        <form action="{{route('admin.productos.delete', $producto->id)}}" method="POST" class="form-eliminar">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></button>
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
    <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
          $('#productos').DataTable( {
            "lengthMenu":[[5,10,50,-1],[5,10,50, "All"]],
            "order": [[ 2, "desc" ]],           
             "scrollX": true,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
                },          
          });
        });
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
    

@stop