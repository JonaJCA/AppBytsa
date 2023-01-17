@extends('adminlte::page')

@section('title', 'Facturación')
@section('css')
    
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
@stop


@section('content_header')
	<h1>
    Listado de Factura Emitidas
    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="location.href='../facturas'">Registrar nuevo</button>    
</h1>
@endsection

@section('content')
	<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Relación de Facturación</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="facturas" class="table table-bordered table-striped display responsive no-wrap" width="100%" style="zoom: 85%;">
                    <thead>
                        <tr>
                            <th>Nº Factura</th>
                            <th>Fecha</th>
                            <th>Descripción</th>
                            <th>Total</th>
                            <th>Fondo Garantía</th>   
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facturas as $factura)
                        <tr>
                            <td>E-0{{$factura->num_fact}}</td>
                            <td>{{$factura->fecha_fact}}</td>
                            <td>{{$factura->descripcion_fact}}</td>
                            <td>S/ {{$factura->total_fact}}</td>
                            <td>S/ {{$factura->fondo_garantia}}</td>
                            <td>
                               <h5>
                                <span class="badge badge-pill
                                    @switch($factura->estado)
                                        @case('Pagado')
                                            badge-success
                                            @break
                                     
                                        @case('Anulado')
                                            badge-warning
                                            @break

                                        @case('Pendiente')
                                            badge-danger
                                            @break
                                     
                                        @default
                                            badge-light
                                    @endswitch">
                                    {{$factura->estado}}
                                </span>
                                </h5>
                            </td>                               
                            <td class="btn-group">
                            <button type="button" class="btn btn-info redondo mr-3"
                                 onclick='Swal.fire({
                                  title:"<h3><b>Consulta Datos</b></h3>", 
                                  html:`<div class="box-body col-md-12" style="zoom: 95%;">
                                          <div class="form-group table-responsive" style="font-size: 15px;">
                                            <center>
                                              <table class="table table-bordered table-striped">
                                                <tr>
                                                  <td><h4><b>Nº Factura:</b></h4></td>
                                                  <td>{{$factura->num_fact}}</td>
                                                </tr>
                                                <tr>
                                                  <td><h4><b>Fecha Emisión:</b></h4></td>
                                                  <td>{{$factura->fecha_fact}}</td>
                                                </tr>
                                                <tr>
                                                  <td><h4><b>Descripción:</b></h4></td>
                                                  <td>{{$factura->descripcion_fact}}</td>
                                                </tr>
                                                <tr>
                                                  <td><h4><b>Sub Total:</b></h4></td>
                                                  <td>{{$factura->sub_total}}</td>
                                                </tr>
                                                <tr>
                                                  <td><h4><b>IGV:</b></h4></td>
                                                  <td>{{$factura->igv_fact}}</td>
                                                </tr>
                                                <tr>
                                                  <td><h4><b>Total Factura:</b></h4></td>
                                                  <td>{{$factura->total_fact}}</td>
                                                </tr>
                                                <tr>
                                                  <td><h4><b>Detracción:</b></h4></td>
                                                  <td>{{$factura->detraccion}}</td>
                                                </tr>
                                                <tr>
                                                  <td><h4><b>Fondo Garantía:</b></h4></td>
                                                  <td>{{$factura->fondo_garantia}}</td>
                                                </tr>
                                                <tr>
                                                  <td><h4><b>Monto Recibido:</b></h4></td>
                                                  <td>{{$factura->depositado}}</td>
                                                </tr>
                                                <tr>
                                                  <td><h4><b>Estado:</b></h4></td>
                                                  <td>{{$factura->estado}}</td>
                                                </tr><tr>
                                                  <td><h4><b>Presentado el:</b></h4></td>
                                                  <td>{{$factura->fecha_presenta}}</td>
                                                </tr>
                                              </table>                                  
                                            </center>
                                          </div>
                                        </div>`, 
                                  showCloseButton:true, focusConfirm:false, showConfirmButton:false, width: "80%"
                                })'
                                ><i class="fas fa-solid fa-eye"></i>
                            </button>

                                <button type="button" class="btn btn-warning mr-3" data-toggle="modal" data-target="#modal-update-factura-{{$factura->id}}" m>
                                <i class="fas fa-solid fa-pen"></i>
                                </button>
                                <form action="{{route('admin.facturas.destroy', $factura->id)}}" method="POST" class="form-eliminar">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>  
                         <!--modal Actualización-->
                            @include('admin.facturas.modal-update-factura') 
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
    $('#facturas').DataTable( {
        "lengthMenu":[[5,10,50,-1],[5,10,50, "All"]],
        "order": [[ 0, "desc" ]],
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