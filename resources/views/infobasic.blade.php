@extends('adminlte::page')

@section('title', 'Informacion')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/dataTables.responsive.css">
    <link rel="shortcut icon" href="{{ asset('icon/favicon.ico') }}">
@stop


@section('content_header')
	
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   <h3 class="card-title">Consulta Datos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">    
                    <td class="btn-group">
                        <div class="box-body col-md-12" style="zoom: 90%;">
                            <div class="form-group table-responsive" style="font-size: 15px;">
                                <center>
                                    <table class="table table-bordered table-striped">
                                        @foreach ($empresa as $emp)
                                        <tr>
                                          <td><b>Razón Social: </b></td>
                                          <td>{{$emp->razon_social}}</td>
                                        </tr>
                                        <tr>
                                          <td><b>RUC: </b></td>
                                          <td>{{$emp->ruc_empre}}</td>
                                        </tr>
                                        <tr>
                                          <td><b>Domicilio Fiscal:</b></td>
                                          <td>{{$emp->direc_fiscal}}</td>
                                        </tr>
                                        <tr>
                                          <td><b>Cuenta Cte:</b></td>
                                          <td>{{$emp->cta_cte1}} <b>{{$emp->banco_1}}</b></td>
                                        </tr>
                                        <tr>
                                          <td><b>Cuenta Detracciones:</b></td>
                                          <td>{{$emp->cta_detraccion}}</td>
                                        </tr>
                                        <tr>
                                          <td><b>Cuenta Cte:</b></td>
                                          <td>{{$emp->cta_cte2}} <b>{{$emp->banco_2}}</b></td>
                                        </tr>
                                        <tr>
                                          <td><b>Nº Partida Registral </b></td>
                                          <td>{{$emp->ficha_empre}}</td>
                                        </tr>
                                        <tr>
                                          <td><b>Nº Asiento:</b></td>
                                          <td>{{$emp->asiento}}</td>
                                        </tr>
                                        <tr>
                                          <td><b>Telefono:</b></td>
                                          <td>{{$emp->telefono_empre}}</td>
                                        </tr>
                                        <tr>
                                          <td><b>Representante Legal:</b></td>
                                          <td>{{$emp->rep_legal}}</td>
                                        </tr>
                                        <tr>
                                          <td><b>DNI Representante Legal:</b></td>
                                          <td>{{$emp->dni_repre}}</td>
                                        </tr>
                                        <tr>
                                          <td><b>Email Empresa:</b></td>
                                          <td>{{$emp->email_empre}}</td>
                                        </tr>
                                        @endforeach
                                    </table>                                  
                                </center>
                            </div>
                        </div>                    
                    </td>      
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



@stop