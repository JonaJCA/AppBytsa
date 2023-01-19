<div class="modal fade" id="modal-update-categoria-{{$categoria->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
                <form action="{{ route('admin.categorias.update', $categoria->id)}}" method="POST">
                                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="class form-group">
                            <label for="categoria">Categoría</label>
                            <input type="text" name="categoria" id="categoria" class="form-control" value="{{$categoria->nombre_cate}}">
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