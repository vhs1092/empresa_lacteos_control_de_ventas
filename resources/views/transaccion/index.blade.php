@extends('adminlte::page')

@section('content_header')
    <h1>Transacciones de Inventario</h1>
@stop

@section('content')

   
        <a href="{{route('transaccion.create')}}" class="btn btn-primary pull-right"><i class="fa fa-users fa-fw"></i> <span class="bold">Nueva Transacción</span></a>
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
                                        <th>Observaciones</th>
                              			<th>Cliente</th>
                                        <th>Fecha</th>
                                        <th class="noExport"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @foreach ($transaccion_header as $tp)   
                                    <tr>

                                        <td>
                                        {{$tp->tipo->name}}
                                        </td>    
                                        <td>
                                        {{$tp->numero}}
                                        </td>
                                         <td>
                                        {{$tp->observaciones}}
                                        </td>
                                        @if($tp->id_cliente != null)
                                        <td>
                                        {{$tp->cliente->name}}
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                        <td>
                                        {{$tp->fecha}}
                                        </td>
                                        <td>
                                         <div class="btn-group">
                                          <a href="{{route('transaccion.detail', ['id_tipo_transaccion'=>$tp->id_tipo_transaccion,'numero'=>$tp->numero])}}"><button type="button" class="btn btn-info btn-flat">Detalles</button></a>
                                 
                                          </div>
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
