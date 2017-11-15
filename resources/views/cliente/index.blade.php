@extends('adminlte::page')

@section('content_header')
    <h1>Administración de Clientes</h1>
@stop

@section('content')

    @if(Auth::user()->isAdmin())
        <a href="{{route('cliente.create')}}" class="btn btn-primary pull-right"><i class="fa fa-users fa-fw"></i> <span class="bold">Nuevo Cliente</span></a>
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
                                        <th>Nit</th>
                                        <th>Razón social</th>
                                        <th>Teléfono</th>
                                        <th>Estado</th>
                                        <th></th>
                                  
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                     @foreach ($cliente as $cl)   
                                    <tr>
                                        <td>
                                        {{$cl->name}}
                                        </td>    
                                        <td>
                                        {{$cl->nit}}
                                        </td>
                                         <td>
                                        {{$cl->razon_social}}
                                        </td>  
                                        <td>
                                        {{$cl->telephone}}
                                        </td>
                                        <td>
                                          @if($cl->status == 1)
                                        <a href="{{route('cliente.changeStatus',['cliente'=>$cl->id,'status'=>0])}}"><button type="button" class="btn btn-success btn-flat">Activado</button></a>
                                        @else
                                        <a href="{{route('cliente.changeStatus',['cliente'=>$cl->id,'status'=>1])}}"><button type="button" class="btn btn-danger btn-flat">Desactivado</button></a>
                                        @endif
                                        </td>
                                    <td>
                                    <div class="btn-group">
                                      <a href="{{route('cliente.edit', $cl->id)}}"><button type="button" class="btn btn-info btn-flat">Editar</button></a>
                                
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