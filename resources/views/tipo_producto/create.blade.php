@extends('adminlte::page')

@section('content')

{!! Form::open(['route'=> 'tipo_producto.store','class'=>'form-horizontal']) !!}
    <fieldset>
        @include('tipo_producto.form',['submitButtonText'=>'Crear  Tipo de producto'])
    </fieldset>
{!! Form::close() !!}

@endsection