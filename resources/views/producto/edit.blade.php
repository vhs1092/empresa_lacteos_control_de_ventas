@extends('adminlte::page')

@section('content')
<h3 class="title">Editar: </h3>

<div class="row">
    <div class=" col-xs-10 col-md-10 col-lg-10 col-md-offset-1">
        {!! Form::model($producto,['method'=>'PATCH','action' => ['ProductoController@update',$producto->id],'class'=>'form-horizontal']) !!}

        <fieldset>
        @include('producto.form',['submitButtonText'=>'Actualizar Producto'])
        </fieldset>
        {!! Form::close() !!}
    </div>
</div>
@endsection

