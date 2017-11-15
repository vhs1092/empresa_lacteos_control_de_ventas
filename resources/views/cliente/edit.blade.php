@extends('adminlte::page')

@section('content')
<h3 class="title">Editar: </h3>

<div class="row">
    <div class=" col-xs-10 col-md-10 col-lg-10 col-md-offset-1">
        {!! Form::model($cliente,['method'=>'PATCH','action' => ['ClienteController@update',$cliente->id],'class'=>'form-horizontal']) !!}

        <fieldset>
        @include('cliente.form',['submitButtonText'=>'Actualizar Tipo de producto'])
        </fieldset>
        {!! Form::close() !!}
    </div>
</div>
@endsection

