@extends('adminlte::page')

@section('title', 'Categorias')
@section('css')

@stop


@section('content_header')
    <h1>
    Registro de Categorías
    </h1>
@endsection

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Registro de Categorías</h3>
                    </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="categorias" class="table table-bordered table-striped">
                        <tbody>
                            <form action="{{ route('admin.categorias.store')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="class form-group">
                                        <label for="unidad">Nombre</label>
                                        <input type="text" name="categoria" id="categoria" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
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

@stop