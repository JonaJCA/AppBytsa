@extends('adminlte::page')

@section('title', 'Sistema de Gestión')
<!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="shortcut icon" href="{{ asset('icon/favicon.ico') }}">


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"><!-- Zona Card -->
                <div class="card-header">{{ __('Bienvenidos al Sistema de Control Interno de la Empresa!!') }}</div>

                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3>{{App\Modelos\Producto::count()}}</h3>

                            <p>Productos</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                          <a href="admin/productos/listar" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                          <div class="inner">
                            <h3>{{App\Modelos\Proveedor::count()}}</h3>

                            <p>Proveedores</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-briefcase"></i>
                          </div>
                          <a href="admin/proveedores/listar" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                          <div class="inner">
                            <h3>{{App\Modelos\Colaboradores::count()}}</h3>

                            <p>Colaboradores</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-person-add"></i>
                          </div>
                          <a href="admin/colaboradores/listar" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                            <h3>{{App\Modelos\Factura::whereYear('fecha_fact', '2022')->count()}}</h3>

                            <p>Facturación</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="admin/facturas/listar" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    
                    <!-- /.row (main row) -->
                  </div><!-- /.container-fluid -->

            </div><!-- fin Zona CARD -->
            <div class="card">
                <div class="card-header">{{ __('Graficos informativos del año actual!!') }}</div>

                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="card card-danger">
                          <div class="card-header">
                            <h3 class="card-title">Facturas</h3>

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
                      <div class="col-lg-9 col-6">
                        <!-- small box -->
                          <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">
                                  <i class="far fa-chart-bar"></i>
                                  Facturación Mensual
                                </h3>

                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                  </button>
                                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                  </button>
                                </div>
                            </div>
                              <div class="card-body">
                                <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px"></canvas>
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
        </div>
    </div>
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
          'Pendientes', 
          'Canceladas',
          'Anuladas',  
      ],
      datasets: [
        {
          data: [{{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->where('estado','Pendiente')->count()}},{{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->where('estado','Pagado')->count()}},{{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->where('estado','Anulado')->count()}}],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
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
 
    //-------------
    //- BAR CHART -
    //-------------
      const ctx = document.getElementById('myChart').getContext('2d');
      const myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
              datasets: [{
                  label: 'Facturación Total (Monto / mes)',
                  data: [
                  {{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->whereMonth('fecha_fact', '01')->sum('total_fact')}}, 
                  {{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->whereMonth('fecha_fact', '02')->sum('total_fact')}}, 
                  {{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->whereMonth('fecha_fact', '03')->sum('total_fact')}},
                  {{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->whereMonth('fecha_fact', '04')->sum('total_fact')}},
                  {{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->whereMonth('fecha_fact', '05')->sum('total_fact')}},
                  {{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->whereMonth('fecha_fact', '06')->sum('total_fact')}},
                  {{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->whereMonth('fecha_fact', '07')->sum('total_fact')}}, 
                  {{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->whereMonth('fecha_fact', '08')->sum('total_fact')}}, 
                  {{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->whereMonth('fecha_fact', '09')->sum('total_fact')}},
                  {{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->whereMonth('fecha_fact', '10')->sum('total_fact')}},
                  {{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->whereMonth('fecha_fact', '11')->sum('total_fact')}},
                  {{App\Modelos\Factura::whereYear('fecha_fact', now('Y'))->whereMonth('fecha_fact', '12')->sum('total_fact')}}],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
 })
</script>
@endsection
