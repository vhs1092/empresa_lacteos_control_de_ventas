@extends('adminlte::page')

@section('content_header')
    <h1>Transacciones de Inventario</h1>

@stop

@section('content')

   <!-- @if(Auth::user()->isAdmin())
        <a href="{{route('tipo_producto.create')}}" class="btn btn-primary pull-right"><i class="fa fa-users fa-fw"></i> <span class="bold">Nuevo Tipo de producto</span></a>
    @endif 
    -->
    <div class="row">
        <div class="col-sm-10 col-xs-10 col-md-10 col-lg-10">
            <div class='box box-primary'>
              <form class="form-horizontal">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                           <div class="col-sm-10">
                           <label class="control-label" for="tipo_transaccion">Tipo Transacción</label>
                           <select tabindex="-1"  id="tipo_transaccion" class="form-control select2 select2-hidden-accessible tran_select" aria-hidden="true" style="width: 100%;">
                               @foreach ($tipo_transaccion as $tp)  
                                <option value="{{$tp->id}}"> {{$tp->name}}</option>
                               @endforeach
                            </select>
                           </div>
                        </div>  
                    </div>


                     <div class="col-md-6">
                          <div class="form-group">
                            <div class="col-sm-12">
                                 <label class="control-label">Observaciones</label>
                                 <textarea class="col-sm-2 form-control" placeholder="Observaciones..."></textarea>
                            </div>
                          </div>
                        </div> 

                      <div class="col-md-12">
                        <div id="clientes-control" class="form-group" hidden="true">
                          <div class="col-sm-10">
                             <label class="control-label" for="clientes">Cliente</label>
                             <input class="form-control" id="clientes" type="text" placeholder="Cliente">
                          </div>
                        </div>
                      </div>


                     <div class="col-md-6">
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="producto_1">Producto</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="producto_1" type="text" placeholder="Producto">
                                </div>
                        </div>
                      </div> 

                      <div class="col-md-6"> 
                      <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="cantidad_1">Cantidad</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="cantidad_1" type="text" placeholder="Cantidad">
                                </div>
                        </div>
                      </div> 

                      <div id="mas_elementos"></div>

                      <div class="col-md-6"> 
                        <div class="form-group">
                                <div class="col-sm-2">
                                   <button class="btn btn-block btn-sm" id="boton_nuevo">
                                   <i class="fa fa-plus"></i></button>
                                </div>
                                 <div class="col-sm-2">
                                   <button class="btn btn-block btn-sm" id="boton_menos">
                                   <i class="fa fa-minus"></i></button>
                                </div>
                        </div>
                      </div>  
                </div> 
                
                 <!-- /.box-body -->
                 <div class="box-footer">
                  <div class="col-md-6">
                       <a class="btn btn-app" id="boton_cancela">
                            <i class="fa fa-times"></i> Cancelar
                      </a>

                      <a class="btn btn-app" id="boton_guardar">
                            <i class="fa fa-save"></i> Guardar
                      </a>
                  </div>    
                      <div class="col-md-6">
                        <H2>Total:</H2>
                      </div>   

                 </div>
                    <!-- /.box-footer -->
             </form>
           </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript" src="{{ url(mix('js/main.js').'?v='.date('Ymd'))}}"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/transaccion.js"></script>
@stop