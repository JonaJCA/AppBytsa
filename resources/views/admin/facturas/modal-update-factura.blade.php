<div class="modal fade" id="modal-update-factura-{{$factura->id}}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content bg-default">
                                <div class="modal-header">
                                    <h4 class="modal-title">Actualizar Datos</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ route('admin.facturas.update', $factura->id)}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body row">
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="num_fact">Nº Factura</label>
                                            <input type="text" name="num_fact" id="num_fact" class="form-control" value="{{$factura->num_fact}}">
                                        </div>
                                        <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                            <label for="descripcion_fact">Descripción</label>
                                            <input type="text" name="descripcion_fact" id="descripcion_fact" class="form-control" value="{{$factura->descripcion_fact}}">
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="sub_total">Sub Total</label>
                                            <input type="text" name="sub_total" id="sub_total" class="form-control" value="{{$factura->sub_total}}">
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="igv_fact">Igv</label>
                                            <input type="text" name="igv_fact" id="igv_fact" maxlength="8" class="form-control" value="{{$factura->igv_fact}}" />
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="total_fact">Total Factura</label>
                                            <input type="text" name="total_fact" id="total_fact" class="form-control " value="{{$factura->total_fact}}"/>
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="detraccion">Detracción</label>
                                            <input type="text" name="detraccion" id="detraccion" class="form-control " value="{{$factura->detraccion}}"/>
                                        </div>
                                        <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="fondo_garantia">Fondo de Garantía</label>
                                            <input type="text" name="fondo_garantia" id="fondo_garantia" class="form-control " value="{{$factura->fondo_garantia}}"/>
                                        </div>
                                        <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                            <label for="depositado">Depositado</label>
                                            <input type="text" name="depositado" id="depositado" class="form-control " value="{{$factura->depositado}}"/>
                                        </div>
                                        <div class="class form-group  col-md-6 col-sm-12 col-xs-12">
                                            <label for="estado">Estado</label>
                                            <input type="text" name="estado" id="estado" class="form-control" value="{{$factura->estado}}">
                                        </div>
                                        <div class="class form-group  col-md-6 col-sm-12 col-xs-12">
                                            <label for="fecha_fact">Fecha Emisión</label>
                                            <input type="text" name="fecha_fact" id="fecha_fact" class="form-control" value="{{$factura->fecha_fact}}">
                                        </div>
                                        <div class="class form-group  col-md-6 col-sm-12 col-xs-12">
                                            <label for="fecha_presenta">Fecha Presentado</label>
                                            <input type="text" name="fecha_presenta" id="fecha_presenta" class="form-control" value="{{$factura->fecha_presenta}}">
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