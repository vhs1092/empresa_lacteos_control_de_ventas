@extends('adminlte::page')

@section('content_header')
    <h1>Administración de Tipos de Transacciones</h1>
@stop

@section('content')

    @if(Auth::user()->isAdmin())
        <a href="{{route('tipo_transaccion.create')}}" class="btn btn-primary pull-right"><i class="fa fa-users fa-fw"></i> <span class="bold">Nuevo Tipo de Transaccion</span></a>
    @endif
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
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Tipo</th>
                                        <th>Maneja_Cliente</th>
                                        <th>Estatus</th>
                                         <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                     @foreach ($tipo_transaccion as $tp)   
                                    <tr>

                                        <td>
                                        {{$tp->name}}
                                        </td>    
                                        <td>
                                        {{$tp->description}}
                                        </td>
                                        <td>
                                        @if($tp->tipo==1)
                                           <p>Suma</p>
                                        @else
                                           <p>Resta</p>
                                        @endif
                                        </td>
                                         <td>
                                        @if($tp->maneja_cliente==1)
                                           <p>Si</p>
                                        @else
                                           <p>No</p>
                                        @endif
                                        </td>
                                        <td>
                                        @if($tp->status == 1)
                                        <a href="{{route('tipo_transaccion.changeStatus',['tipo_transaccion'=>$tp->id,'status'=>0])}}"><button type="button" class="btn btn-success btn-flat">Activado</button></a>
                                        @else
                                        <a href="{{route('tipo_transaccion.changeStatus',['tipo_transaccion'=>$tp->id,'status'=>1])}}"><button type="button" class="btn btn-danger btn-flat">Desactivado</button></a>
                                        @endif

                                        </td>
                                    <td>
                                    <div class="btn-group">
                                      <a href="{{route('tipo_transaccion.edit', $tp->id)}}"><button type="button" class="btn btn-info btn-flat">Editar</button></a>
                                     <a href="#"> <button type="button" class="btn btn-danger btn-flat">Eliminar</button></a>
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
@section('js')
<script type="text/javascript" src="{{ url(mix('js/main.js').'?v='.date('Ymd'))}}"></script>
@stop