@extends('adminlte::page')

@section('content_header')
    <h1>Transacciones de Inventario</h1>
@stop

@section('content')

   
        <a href="{{route('transaccion.create')}}" class="btn btn-primary pull-right"><i class="fa fa-users fa-fw"></i> <span class="bold">Nueva Transacción</span></a>
    <div class="row">
        <div class="col-sm-10 col-xs-10 col-md-10 col-lg-10">
            <div class='box box-primary'>
             
           </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript" src="{{ url(mix('js/main.js').'?v='.date('Ymd'))}}"></script>

@stop