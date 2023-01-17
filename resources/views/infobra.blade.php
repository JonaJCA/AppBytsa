@extends('adminlte::page')

@section('title', 'Informacion')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/dataTables.responsive.css">
    <link rel="shortcut icon" href="{{ asset('icon/favicon.ico') }}">
@stop


@section('content_header')
	
@endsection

@section('content')
<div class="card">
   <div class="card-header">{{ __('Graficos informativos de Proyectos actuales!!') }}</div>
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Valorizaciones</h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="card card-green">
                        <div class="card-header">
                            <h3 class="card-title">Fondo de Garantía</h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    <!-- /.card-body -->
                    </div>
                </div>      
                    <!-- ./col -->
                    <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Valorizaciones</h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    <!-- /.card-body -->
                    </div>
                </div>      
                    <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="card card-yellow">
                        <div class="card-header">
                            <h3 class="card-title">Fondo de Garantía</h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart4" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    <!-- /.card-body -->
                    </div>
                </div>      
                    <!-- ./col -->
            </div>
            <!-- /.row -->
                    <!-- Main row -->
                    
                    <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
                  
</div>


@endsection

@section('js')
   <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
<script>
  // Get context with jQuery - using jQuery's .get() method.
  $(function () {
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Total Cobrado',
          'Monterrico',                     
      ],
      datasets: [
        {
          data: [{{App\Modelos\Factura::where('descripcion_fact', 'like', '%Monterrico%')->sum('total_fact')}}],
          backgroundColor : ['#00a65a'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    });
  
 });
  $(function () {
    var donutChartCanvas = $('#donutChart2').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Total Cobrado',
          'Torreblanca',                     
      ],
      datasets: [
        {
          data: [{{App\Modelos\Factura::where('descripcion_fact', 'like', '%Torreblanca%')->sum('total_fact')}}],
          backgroundColor : ['#f39c12'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    });
  
 });
$(function () {
    var donutChartCanvas = $('#donutChart3').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Total Retenido',
          'Monterrico',                     
      ],
      datasets: [
        {
          data: [{{App\Modelos\Factura::where('descripcion_fact', 'like', '%Monterrico%')->sum('fondo_garantia')}}],
          backgroundColor : ['#00a65a'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    });
  
 });
$(function () {
    var donutChartCanvas = $('#donutChart4').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Total Retenido',
          'Torreblanca',                     
      ],
      datasets: [
        {
          data: [{{App\Modelos\Factura::where('descripcion_fact', 'like', '%Torreblanca%')->sum('fondo_garantia')}}],
          backgroundColor : ['#f39c12'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    });
  
 })



</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>



@stop