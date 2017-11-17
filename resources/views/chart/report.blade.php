
@extends('adminlte::page')

@section('content_header')
  {!! HighCharts::styles() !!}
@stop

@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script src="http://code.highcharts.com/modules/exporting.js"></script>
<!-- optional -->
<script src="http://code.highcharts.com/modules/offline-exporting.js"></script>


  <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="hpanel">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-heading">High Chart Demo</div>

                <div class="panel-body">
                    {!! $highchart->html() !!}
                </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



{!! HighCharts::scripts() !!}
        {!! $highchart->script() !!}

@endsection