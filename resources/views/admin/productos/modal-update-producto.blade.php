<div class="modal fade" id="modal-update-producto-{{$producto->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Productos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.productos.update', $producto->id)}}" method="POST">
                                    {{ csrf_field() }}
                <div class="modal-body row">
                                        <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                            <label for="nombre_produ">Nombre</label>
                                            <input type="text" name="nombre_produ" id="nombre_produ" class="form-control" value="{{$producto->nombre_produ}}">
                                        </div>
                                        <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                            <label for="caracteristica_produ">Caracteristica</label>
                                            <input type="text" name="caracteristica_produ" id="caracteristica_produ" class="form-control" value="{{$producto->caracteristica_produ}}">
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="marca_producto">Marca</label>
                                            <input type="text" name="marca_producto" id="marca_producto" class="form-control" value="{{$producto->marca_producto}}">
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="costo_producto">Costo</label>
                                            <input type="text" name="costo_producto" id="costo_producto" class="form-control" value="{{$producto->costo_producto}}">
                                        </div>
                                        <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                           <label for="cate_id">Categoria</label>                                      
                                            <select for="cate_id" name="cate_id" id="cate_id" class="form-control col-md-12 col-sm-12 col-xs-12" data-show-subtext="true" data-live-search="true" >   
                                                <option class='btn-danger' value="{{ $producto->cate_id }}">ACTUAL: {{ $producto->cate_id }} - {{$producto->cate->nombre_cate}}</option>                                             
                                                @foreach($cate as $catego)                                               
                                                    <option class="btn-primary" value="{{$catego->id}}">
                                                         {{$catego->id}} - {{$catego->nombre_cate}}
                                                    </option>
                                                @endforeach
                                            </select>                                         
                                        </div>
                                        
                                        <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                           <label for="uni_id">Unidad</label>
                                            <select for="uni_id" name="uni_id" id="uni_id" class="form-control col-md-12 col-sm-12 col-xs-12" data-show-subtext="true" data-live-search="true" >   
                                                <option class='btn-danger' value="{{ $producto->uni_id }}">ACTUAL: {{ $producto->uni_id }} - {{$producto->produd_und->nombre_und}}</option>                                             
                                                @foreach($produd_und as $unidads)                                               
                                                    <option class="btn-primary" value="{{$unidads->id}}">
                                                         {{$unidads->id}} - {{$unidads->nombre_und}}
                                                    </option>
                                                @endforeach
                                            </select>                                          
                                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>