<div class="modal fade" id="modal-update-category-{{$unidad->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content bg-default">
                                <div class="modal-header">
                                    <h4 class="modal-title">Actualizar Unidad</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ route('admin.unidades.update', $unidad->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="class form-group">
                                            <label for="unidad">Nombre</label>
                                            <input type="text" name="unidad" id="unidad" class="form-control" value="{{$unidad->nombre_und}}">
                                        </div>
                                        <div class="class form-group">
                                            <label for="abreviatura_und">Abreviatura</label>
                                            <input type="text" name="abreviatura_und" id="abreviatura_und" class="form-control" value="{{$unidad->abreviatura_und}}">
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