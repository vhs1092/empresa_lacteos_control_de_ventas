@extends('adminlte::page')

@section('content')

{!! Form::open(['route'=> 'producto.store','class'=>'form-horizontal']) !!}
    <fieldset>
        @include('producto.form',['submitButtonText'=>'Crear  Tipo de producto'])
    </fieldset>
{!! Form::close() !!}

@endsection