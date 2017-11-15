@extends('adminlte::page')

@section('content')

{!! Form::open(['route'=> 'tipo_transaccion.store','class'=>'form-horizontal']) !!}
    <fieldset>
        @include('tipo_transaccion.form',['submitButtonText'=>'Crear  Tipo de Transaccion'])
    </fieldset>
{!! Form::close() !!}

@endsection