@extends('adminlte::page')

@section('content_header')
    <h1>Administración de Productos</h1>
@stop

@section('content')

    @if(Auth::user()->isAdmin())
        <a href="{{route('producto.create')}}" class="btn btn-primary pull-right"><i class="fa fa-users fa-fw"></i> <span class="bold">Nuevo Producto</span></a>
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
                                        <th>Stock</th>
                                        <th>status</th>
                                        <th></th>
                                  
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                     @foreach ($producto as $tp)   
                                    <tr>

                                        <td>
                                        {{$tp->name}}
                                        </td>    
                                        <td>
                                        {{$tp->description}}
                                        </td>
                                        <td>
                                        {{$tp->id_tipo_producto}}
                                        </td>
                                        <td>
                                        {{$tp->stock}}
                                        </td>
                                        <td>
                                        {{$tp->status}}
                                        </td>
                                    <td>
                                    <div class="btn-group">
                                      <a href="{{route('tipo_producto.edit', $tp->id)}}"><button type="button" class="btn btn-info btn-flat">Editar</button></a>
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