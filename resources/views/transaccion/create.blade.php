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
              <!--<form id="transaccion_form" class="form-horizontal" action="transaccion@save" method="post">-->
                {!! Form::open(array('id'=>'transaccion_form', 'class'=>'form-horizontal', 'route'=>'transaccion.store')) !!}
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="text" id="nlineas" name="nlineas" value="1" hidden="true">
                
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                           <div class="col-sm-10">
                           <label class="control-label" for="tipo_transaccion">Tipo Transacción</label>
                           <select tabindex="-1"  name="tipo_transaccion" id="tipo_transaccion" class="form-control select2 select2-hidden-accessible tran_select" aria-hidden="true" style="width: 100%;">
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
                                 <textarea class="col-sm-2 form-control" name="observaciones" placeholder="Observaciones..."></textarea>
                            </div>
                          </div>
                        </div> 

                      <div class="col-md-12">
                        <div id="clientes-control" class="form-group" hidden="true">
                          <div class="col-sm-10">
                             <label class="control-label" for="clientes">Cliente</label>
                             <input class="form-control" name="cliente" id="clientes" type="text" placeholder="Cliente">
                          </div>
                        </div>
                      </div>


                     <div class="col-md-6">
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="producto_1">Producto</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="producto_1" id="producto_1" type="text" placeholder="Producto" required="true">
                                </div>
                        </div>
                      </div> 

                      <div class="col-md-6"> 
                      <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="cantidad_1">Cantidad</label>
                                <div class="col-sm-4">
                                    <input class="form-control cantidad" name="cantidad_1" id="cantidad_1" type="text" placeholder="Cantidad" required="true">
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
                       <a href="{{route('transaccion.index')}}" class="btn btn-app" id="boton_cancela">
                            <i class="fa fa-times"></i> Cancelar
                       </a>

                       <button  type="submit" class="btn btn-app" >
                            <i class="fa fa-save"></i> Guardar
                       </button>
                  </div>    
                      <div class="col-md-6">
                        <H2 class="col-md-4">Total: </H2> <H2 class="col-md-4"><input id="inputTotal" class="col-md-12" value="0" readonly="true" ></H2>
                      </div>  
                     
                 </div>
                    <!-- /.box-footer -->
             {!! Form::close() !!}
           </div>
        </div>
    </div>
@endsection
