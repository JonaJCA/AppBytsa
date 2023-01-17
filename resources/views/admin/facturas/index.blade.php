@extends('adminlte::page')

@section('title', '::Registro de Facturas::')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
	<center>
		<h1>
	    Panel de Registro de Facturas
	    </h1>
    </center>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Control Interno de Facturación - Ventas</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="facturas" class="table table-bordered table-striped">
                    <tbody>
                       <form action="{{ route('admin.facturas.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body row" >
                                <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" name="fecha_fact" id="fecha_fact" class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-6 col-sm-12 col-xs-12">
                                    <label for="descripcion_fact">Descripción</label>
                                    <input type="text" name="descripcion_fact" id="descripcion_fact" class="form-control" required/>                                      
                                </div>
                                <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                    <label for="num_fact">Nº Documento</label>
                                    <input type="text" name="num_fact" id="num_fact" maxlength="10" class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-2 col-sm-12 col-xs-12">
                                    <label for="sub_total">Sub Total</label>
                                    <input type="text" name="sub_total" id="sub_total"  class="form-control " readonly="readonly"/>
                                </div>
                                <div class="class form-group col-md-2 col-sm-12 col-xs-12">
                                    <label for="igv">IGV</label>
                                    <input type="text" name="igv_fact" id="igv_fact" class="form-control " readonly="readonly"/>
                                </div>
                                <div class="class form-group col-md-2 col-sm-12 col-xs-12">
                                    <label for="total_fact">Total Factura</label>
                                    <input type="text" name="total_fact" id="total_fact" class="form-control " onchange="CalculoIgv()" required>  
                                </div>
                                <div class="class form-group col-md-2 col-sm-12 col-xs-12">
                                    <label for="detraccion">Detracción</label>
                                    <input type="text" name="detraccion" id="detraccion"  class="form-control " required/>
                                </div>
                                <div class="class form-group col-md-2 col-sm-12 col-xs-12">
                                    <label for="fondo_garantia">Fondo Garantía</label>
                                    <input type="text" name="fondo_garantia" id="fondo_garantia" class="form-control" required/>
                                </div>    
                                <div class="class form-group col-md-4 col-sm-12 col-xs-12">
                                    <label for="depositado">Total Recibido</label>
                                    <input type="text" name="depositado" id="depositado" class="form-control" onclick="fncTotal()" />
                                </div>                             
                                <div class="class form-group col-md-4 col-sm-12 col-xs-12">
                                    <label for="estado">Estado</label>
                                    <input type="text" name="estado" id="estado" class="form-control" required/>
                                </div>
                                <div class="class form-group col-md-3 col-sm-12 col-xs-12">
                                    <label for="fecha_presenta">Presentado</label>
                                    <input type="date" name="fecha_presenta" id="fecha_presenta" class="form-control" required>
                                </div> 
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn btn-outline-primary">Guardar</button>
                                <button type="reset" class="btn btn-outline-warning">Limpiar</button>
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
<script>
    function CalculoIgv() {
    var totalFa = document.getElementById('total_fact').value;
    if(isNaN(totalFa)){
        alert("Introduce un numero, por favor");
        document.getElementById('total_fact').value = "";
    }else{
        var subtotal = parseFloat(totalFa) / 1.18;
        var igv = parseFloat(subtotal) * 0.18;
        var detra = parseFloat(totalFa) * 0.04;
        var fond = parseFloat(subtotal) * 0.10;
        var depo = parseFloat(totalFa) - parseFloat(detra) - parseFloat(fond);
        document.getElementById("sub_total").value = subtotal.toFixed(2);
        document.getElementById("igv_fact").value = igv.toFixed(2);
        document.getElementById("detraccion").value = detra.toFixed(2);
        document.getElementById("fondo_garantia").value = fond.toFixed(2);
        }
    };   
  
    function fncTotal() {
      // Handler for .ready() called.    
        var totalTo = document.getElementById("total_fact").value;    
        var detra = document.getElementById("detraccion").value;
        var fond = document.getElementById("fondo_garantia").value;
        var deposi = totalTo - detra - fond;
        document.getElementById("depositado").value = deposi.toFixed(2);
                   
      };
   
   

</script>
@stop