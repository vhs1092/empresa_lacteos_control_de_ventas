@extends('adminlte::page')

@section('content')

{!! Form::open(['route'=> 'producto.store','class'=>'form-horizontal']) !!}
    <fieldset>
        @include('producto.form',['submitButtonText'=>'Crear  Producto'])
    </fieldset>
{!! Form::close() !!}

@endsection