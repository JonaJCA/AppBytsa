@extends('adminlte::page')

@section('title', 'Informacion')
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/dataTables.responsive.css">
    <link rel="shortcut icon" href="{{ asset('icon/favicon.ico') }}">
@stop

@section('content_header')
    
@endsection

@section('content')
    <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Información del Usuario</h1>
                    </div>
                </div>
            </div>
    </section>
    <div class="table-responsive">
        <table class="table" id="users-table">
            <thead class="thead-dark">
            <tr>
                <th>Nombre Usuario</th>
                <th>Email</th>
                <th colspan="3">Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuario as $us)
                <tr>
                    <td>{!! $us->name !!}</td>
                    <td>{!! $us->email !!}</td>
                    <td class="btn-group">
                        <button type="button" class="btn btn-warning mr-3" data-toggle="modal" data-target="">
                             Editar
                        </button>
                        <form action="" class="form-eliminas" method="POST">
                                {{ csrf_field() }}
                                @method('DELETE')
                            <button class="btn btn-danger">Eliminar</button>
                        </form>                
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('js')
 <!--  <script>
$(document).ready(function() {
    $('#colaboradores').DataTable( {
        "order": [[ 3, "desc" ]],
        responsive: true,
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
        },          
    } );
} );


</script>-->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>



@stop