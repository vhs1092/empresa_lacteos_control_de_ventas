@extends('adminlte::page')

@section('content_header')
    <h1>Administración de Productos</h1>
@stop

@section('content')

    @if(Auth::user()->isAdmin())
        <a href="{{route('producto.create')}}" class="btn btn-primary pull-right"><i class="fa fa-archive"></i> <span class="bold">Nuevo Producto</span></a>
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
                                        <th>Tipo</th>
                                        <th>Stock</th>
                                        <th>Estado</th>
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
                                        {{$tp->tipo->name}}
                                        </td>
                                        <td>
                                        {{$tp->stock}}
                                        </td>
                     
                                        <td>
                                        @if($tp->status == 1)
                                        <a href="{{route('producto.changeStatus',['producto'=>$tp->id,'status'=>0])}}"><button type="button" class="btn btn-success btn-flat">Activado</button></a>
                                        @else
                                        <a href="{{route('producto.changeStatus',['producto'=>$tp->id,'status'=>1])}}"><button type="button" class="btn btn-danger btn-flat">Desactivado</button></a>
                                        @endif

                                        </td>
                                    <td>
                                    <div class="btn-group">
                                      <a href="{{route('producto.edit', $tp->id)}}"><button type="button" class="btn btn-info btn-flat">Editar</button></a>
                                    
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