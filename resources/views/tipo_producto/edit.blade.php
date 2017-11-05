@extends('adminlte::page')

@section('content')
<h3 class="title">Editar: </h3>

<div class="row">
    <div class=" col-xs-10 col-md-10 col-lg-10 col-md-offset-1">
        {!! Form::model($tipo_producto,['method'=>'PATCH','action' => ['TipoProductoController@update',$tipo_producto->id],'class'=>'form-horizontal']) !!}

        <fieldset>
        @include('tipo_producto.form',['submitButtonText'=>'Actualizar Tipo de producto'])
        </fieldset>
        {!! Form::close() !!}
    </div>
</div>
@endsection

