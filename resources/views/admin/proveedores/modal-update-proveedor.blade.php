<div class="modal fade" id="modal-update-proveedor-{{$proveedor->id}}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content bg-default">
                                <div class="modal-header">
                                    <h4 class="modal-title">Actualizar Datos</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ route('admin.proveedores.update', $proveedor->id)}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body row">
                                        <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                            <label for="razon_social">Razón Social</label>
                                            <input type="text" name="razon_social" id="razon_social" class="form-control" value="{{$proveedor->razon_social}}">
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="tipodocu_provee">Tipo Documento</label>
                                            <input type="text" name="tipodocu_provee" id="tipodocu_provee" class="form-control" value="{{$proveedor->tipodocu_provee}}">
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="docu_provee">Nº Documento</label>
                                            <input type="text" name="docu_provee" id="docu_provee" class="form-control" value="{{$proveedor->docu_provee}}">
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="contacto_provee">Contacto</label>
                                            <input type="text" name="contacto_provee" id="contacto_provee" maxlength="8" class="form-control" value="{{$proveedor->contacto_provee}}" />
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="telefono_provee">Teléfono</label>
                                            <input type="text" name="telefono_provee" id="telefono_provee" class="form-control " value="{{$proveedor->telefono_provee}}"/>
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="cuenta1_provee">Cta. Bancaria</label>
                                            <input type="text" name="cuenta1_provee" id="cuenta1_provee" class="form-control " value="{{$proveedor->cuenta1_provee}}"/>
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="cuenta2_provee">Cta. Bancaria 2</label>
                                            <input type="text" name="cuenta2_provee" id="cuenta2_provee" class="form-control " value="{{$proveedor->cuenta2_provee}}"/>
                                        </div>
                                        <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                            <label for="tipo_provee">Tipo Proveedor</label>
                                            <input type="text" name="tipo_provee" id="tipo_provee" class="form-control " value="{{$proveedor->tipo_provee}}"/>
                                        </div>
                                        <div class="class form-group  col-md-6 col-sm-12 col-xs-12">
                                            <label for="activi_provee">Actividad</label>
                                            <input type="text" name="activi_provee" id="activi_provee" class="form-control" value="{{$proveedor->activi_provee}}">
                                        </div>
                                        <div class="class form-group  col-md-12 col-sm-12 col-xs-12">
                                            <label for="referencia_provee">Referencia</label>
                                            <input type="text" name="referencia_provee" id="referencia_provee" class="form-control" value="{{$proveedor->referencia_provee}}">
                                        </div>

                                        <div class="class form-group  col-md-12 col-sm-12 col-xs-12">
                                            <label for="direccion_provee">Dirección</label>
                                            <input type="text" name="direccion_provee" id="direccion_provee" class="form-control" value="{{$proveedor->direccion_provee}}">
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