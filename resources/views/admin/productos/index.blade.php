@extends('adminlte::page')

@section('title', '::Registro de Productos::')
@section('css')
   
@stop

@section('content_header')
	<h1>
    Registro de Productos
    </h1>
@endsection

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Registro de Productos</h3>
                    </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="productos" class="table table-bordered table-striped">
                        <tbody>
                           <form action="{{ route('admin.productos.create')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body row">
                                    <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                        <label for="nombre_produ">Nombre</label>
                                        <input type="text" name="nombre_produ" id="nombre_produ" class="form-control" required>
                                    </div>
                                    <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                        <label for="caracteristica_produ">Caracteristica</label>
                                        <input type="text" name="caracteristica_produ" id="caracteristica_produ" class="form-control" required>
                                    </div>
                                    <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                        <label for="marca_producto">Marca</label>
                                        <input type="text" name="marca_producto" id="marca_producto" class="form-control" required>
                                    </div>
                                    <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                        <label for="costo_producto">Costo</label>
                                        <input type="text" name="costo_producto" id="costo_producto" class="form-control" required>
                                    </div>
                                    <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                       <label for="cate_id">Categoria</label>
                                       <select name="cate_id" id="inputcate_id" class="form-control">
                                        <option>--Seleccione la categoria--</option>
                                           @<?php foreach ($categorias as $categoria): ?>
                                               <option value="{{ $categoria['id'] }}">{{ $categoria['nombre_cate'] }}</option>
                                           <?php endforeach ?>
                                       </select>
                                    </div>
                                    <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                       <label for="uni_id">Unidad</label>
                                       <select name="uni_id" id="inputuni_id" class="form-control">
                                        <option>--Seleccione la unidad--</option>
                                           @<?php foreach ($unids as $unidad): ?>
                                               <option value="{{ $unidad['id'] }}">{{ $unidad['nombre_und'] }}</option>
                                           <?php endforeach ?>
                                       </select>
                                    </div>

                                </div>
                                <div class="modal-footer justify-content-between">
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