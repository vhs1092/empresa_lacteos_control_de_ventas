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
@endsection
