<div class="modal fade" id="modal-update-colaborador-{{$colaborador->id}}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content bg-default">
                                <div class="modal-header">
                                    <h4 class="modal-title">Actualizar Datos</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ route('admin.colaboradores.update', $colaborador->id)}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body row">
                                        <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                            <label for="nombre_emple">Nombre</label>
                                            <input type="text" name="nombre_emple" id="nombre_emple" class="form-control" value="{{$colaborador->nombre_emple}}">
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="apepat_emple">Ap. Paterno</label>
                                            <input type="text" name="apepat_emple" id="apepat_emple" class="form-control" value="{{$colaborador->apepat_emple}}">
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="apemat_emple">Ap. Materno</label>
                                            <input type="text" name="apemat_emple" id="apemat_emple" class="form-control" value="{{$colaborador->apemat_emple}}">
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="docu_emple">Nº Documento</label>
                                            <input type="text" name="docu_emple" id="docu_emple" maxlength="8" class="form-control" value="{{$colaborador->docu_emple}}" />
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="fecna_emple">Fecha Nacimiento</label>
                                            <input type="text" name="fecna_emple" id="fecna_emple" class="form-control " value="{{$colaborador->fecna_emple}}"/>
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="telefono_emple">Teléfono</label>
                                            <input type="text" name="telefono_emple" id="telefono_emple" class="form-control " value="{{$colaborador->telefono_emple}}"/>
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="cuenta_emple">Cta. Bancaria</label>
                                            <input type="text" name="cuenta_emple" id="cuenta_emple" class="form-control " value="{{$colaborador->cuenta_emple}}"/>
                                        </div>
                                        <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                            <label for="email_emple">Email</label>
                                            <input type="text" name="email_emple" id="email_emple" class="form-control " value="{{$colaborador->email_emple}}"/>
                                        </div>

                                        <div class="class form-group  col-md-6 col-sm-12 col-xs-12">
                                            <label for="direccion_emple">Dirección</label>
                                            <input type="text" name="direccion_emple" id="direccion_emple" class="form-control" value="{{$colaborador->direccion_emple}}">
                                        </div>
                                        <div class="class form-group col-md-8 col-sm-12 col-xs-12">
                                        <label for="foto_id"><img src="{{url('/images/',$colaborador->foto ? $colaborador->foto->ruta_foto : 'generico.png') }}" width="40" /></label>
                                        <input type="file" name="foto_id" id="foto_id" class="form-control "/>
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