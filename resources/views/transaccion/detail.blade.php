@extends('adminlte::page')

@section('content_header')
    <h1>Transacciones de Inventario</h1>
@stop

@section('content')

   
<a href="{{route('transaccion.index')}}" class="btn btn-primary pull-right"><i class="fa fa-arrow-circle-left fa-fw"></i> <span class="bold">Regresar</span></a>
  <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="hpanel">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatableData" class="table table-striped">
                                   <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Numero</th>
                                        <th>Nlinea</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                     @foreach($transaccion_detail as $tp)   
                                    <tr>
                                      
                                        <td>
                                        {{$tp->tipo}}
                                        </td>    
                                        <td>
                                        {{$tp->numero}}
                                        </td>
                                        <td>
                                        {{$tp->numero_linea}}
                                        </td>
                                        <td>
                                        {{$tp->producto}}
                                        </td>
                                        <td>
                                        {{$tp->cantidad}}
                                        </td>
                                     </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
use Ghunti\HighchartsPHP\Highchart;
use Ghunti\HighchartsPHP\HighchartJsExpr;
$chart = new Highchart();
$chart->chart->renderTo = "container";
$chart->chart->type = "bar";
$chart->title->text = "Transacciones";

$xData = array();

foreach ($transaccion_detail as $tr){   
   array_push($xData, $tr->tipo);
}

$chart->xAxis->categories = $xData;
$chart->yAxis->min = 0;
$chart->yAxis->title->text = "Detalle transacción";
$chart->tooltip->formatter = new HighchartJsExpr("function() {
    return '' + this.series.name +': '+ this.y +'';}");
$chart->legend->backgroundColor = "#FFFFFF";
$chart->legend->reversed = 1;
$chart->plotOptions->series->stacking = "normal";


$barData = array();

foreach ($transaccion_detail as $tran){ 
   $chart->series[] = array(  'name' => $tran->producto,
    'data' => array($tran->cantidad
    ));
}
?>

<html>
    <head>
    <title>Stacked bar</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php $chart->printScripts(); ?>
    </head>
    <body>
        <div id="container"></div>
        <script type="text/javascript"><?php echo $chart->render("chart1"); ?></script>
    </body>
</html>
@endsection
