@extends('adminlte::page')

@section('content')
<h3 class="title">Editar: </h3>

<div class="row">
    <div class=" col-xs-10 col-md-10 col-lg-10 col-md-offset-1">
        {!! Form::model($tipo_transaccion,['method'=>'PATCH','action' => ['TipoTransaccionController@update',$tipo_transaccion->id],'class'=>'form-horizontal']) !!}

        <fieldset>
        @include('tipo_transaccion.form',['submitButtonText'=>'Actualizar Tipo de transaccion'])
        </fieldset>
        {!! Form::close() !!}
    </div>
</div>
@endsection