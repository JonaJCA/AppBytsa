$(document).on('click', '#Crear', function() {
        $('#ModalCrear').modal('show');
    });

    $(document).on('click', '#agregar_nombres', function() {
        $('#ModalAgregarNombre').modal('show');
    });
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />


    <button type="button" id="Crear" class="btn btn-primary">
        <span class="fa fa-plus"></span> Agregar
    </button>

    <div id="ModalCrear" class="modal fade" role="dialog" style="overflow-y: scroll;"> 
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header"> 
    				<h4 class="modal-tittle">Crear</h4> 
    			</div> 
    			<form class="form-horizontal" role="form" id="form-crear">
    				<div class="modal-body"> 
    					<div class="row form-group col-md-12">
    						<label for="crear_codigo" class="control-label col-sm-2 col-xs-12">Código: </label>
    						<div class="col-sm-4 col-xs-6">
    							<input type="number" class="form-control" id="crear_codigo" name="crear_codigo">
    						</div>
    					</div>  
    					<div class="row form-group col-md-12">
    						<label for="crear_nombre" class="control-label col-sm-2 col-xs-12">Nombre: </label>
    						<div class="col-sm-6 col-xs-10 selectContainer">
    							<select id="crear_nombre" name="crear_nombre" class="form-control" style="width: 100%;">
                                        <option value="0">Seleccione...</option>
                                        <option value="1">Clorace</option>
                                        <option value="2">Miovit</option>
    							</select>
    						</div>
    						<div class="col-sm-2 col-xs-2">
    							<button type="button" class="btn btn-primary" id="agregar_nombres">
    								<span class="fa fa-plus"></span>
                        			<span class="hidden-xs"> Agregar Items</span> 
    							</button>
    						</div>
    					</div> 
    					<div class="row form-group col-md-12">
    						<label for="crear_formas_farmaceuticas" class="control-label col-sm-2 col-xs-12">Forma Farmacéutica: </label>
    						<div class="col-sm-6 col-xs-10 selectContainer">
    							<select id="crear_formas_farmaceuticas" class="form-control" name="crear_formas_farmaceuticas" style="width: 100%;">
                                        <option value="0">Seleccione...</option>
                                        <option value="1">Inyección</option>
                                        <option value="2">Jarabe</option>
    							</select>
    						</div>
    						<div class="col-sm-1 col-xs-2">
    							<button type="button" class="btn btn-primary" id="agregar_formas">
    								<span class="fa fa-plus"></span>
                        			<span class="hidden-xs"> Agregar Items</span> 
    							</button>
    						</div>
    					</div>
    					<div class="row form-group col-md-12">
    						<label for="crear_presentacion" class="control-label col-sm-2 col-xs-12">Presentación: </label>
    						<div class="col-sm-3 col-xs-5">
    							<input type="number" class="form-control" id="crear_presentacion" name="crear_presentacion">
    						</div> 
    						<div class="col-sm-4 col-xs-7 selectContainer">
    							<select id="crear_unidad_de_medicion_p" class="form-control" name="crear_unidad_de_medicion_p" style="width: 100%;">
                                        <option value="0">Seleccione...</option>
                                        <option value="1">(und) Unidad</option>
                                        <option value="2">(ml) Mililitro</option>
                                        <option value="2">(mg) Miligramo</option>
    							</select>
    						</div>
    					</div>
    					<div class="row form-group col-md-12">
    						<label for="crear_unidad_teorica" class="control-label col-sm-2 col-xs-12">Unidad Teórica: </label>
    						<div class="col-sm-5 col-xs-5">
    							<input type="number" class="form-control" id="crear_unidad_teorica" name="crear_unidad_teorica">
    						</div> 
    						<div class="col-sm-4 col-xs-7 selectContainer">
    							<select id="crear_unidad_de_medicion_u" class="form-control" name="crear_unidad_de_medicion_u" style="width: 100%;">
                                        <option value="0">Seleccione...</option>
                                        <option value="1">(und) Unidad</option>
                                        <option value="2">(ml) Mililitro</option>
                                        <option value="2">(mg) Miligramo</option>
    							</select>
    						</div>
    					</div>
    					<div class="row form-group col-md-12">
    						<label for="crear_velocidad" class="control-label col-sm-2 col-xs-12">Velocidad del Producto: </label>
    						<div class="col-sm-3 col-xs-5">
    							<input type="number" class="form-control" id="crear_velocidad" name="crear_velocidad">
    						</div> 
    						<label class="col-sm-5 col-xs-7">
    							<h4>
    								<sup id="crear_unidad_de_medicion_v_u" name="crear_unidad_de_medicion_v_u">
    									
    								</sup>
    								/
    								<sub id="crear_unidad_de_medicion_v_t" name="crear_unidad_de_medicion_v_t">
    									min
    								</sub>
    							</h4>
    						</label>
    					</div>
    					<div class="row form-group col-md-12">
    						<label class="control-label col-sm-2 col-xs-12">Tiempo Teórico: </label>
    						<label class="col-sm-7 col-xs-7">
    							<h4>
    								<sub id="crear_tiempo_teorico" name="crear_tiempo_teorico">
    									
    								</sub>
    							</h4>
    						</label>
    					</div>
    					<div class="row form-group col-md-12">
    						<label for="crear_linea_de_produccion" class="control-label col-sm-2">Linea de Producción:</label>
    						<div class="col-sm-8 selectContainer">
    							<select id="crear_linea_de_produccion" class="form-control" name="crear_linea_de_produccion" style="width: 100%;">
                                        <option value="0">Seleccione...</option>
                                        <option value="1">Liquidos Esteriles</option>
                                        <option value="2">Liquidos No Esteriles</option>
                                        <option value="2">Solidos</option>
    							</select>
    						</div>
    					</div>
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-default" data-dismiss="modal">
    						<span class="glyphicon glyphicon-remove"></span>
                        	<span class="hidden-xs"> Cerrar</span> 
    					</button>
    					<button type="button" id="Guardar" name="Guardar" class="btn btn-primary">
    						<span class="fa fa-save"></span>
                        	<span class="hidden-xs"> Guardar</span> 
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>

    <div id="ModalAgregarNombre" class="modal fade" role="dialog"> 
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header"> 
    				<h4 class="modal-tittle">Agregar</h4>
    			</div> 
    			<form class="form-horizontal" role="form" id="form-agregar">
    				<div class="modal-body"> 
    					<div class="form-group col-md-12">
    						<label for="agregar_nombre" class="control-label col-sm-4">Nombre: </label>
    						<div class="col-sm-8">
    							<input type="text" class="form-control" id="agregar_nombre" name="agregar_nombre">
    						</div>
    					</div> 
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-default" data-dismiss="modal">
    						<span class="glyphicon glyphicon-remove"></span><span class="hidden-xs"> Cerrar</span>
    					</button>
    					<button type="button" id="GuardarNombre" name="GuardarNombre" class="btn btn-primary">
    						<span class="fa fa-save"></span><span class="hidden-xs"> Guardar</span>
                          
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>