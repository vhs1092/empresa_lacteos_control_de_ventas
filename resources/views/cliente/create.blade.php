@extends('adminlte::page')

@section('content')

{!! Form::open(['route'=> 'cliente.store','class'=>'form-horizontal']) !!}
    <fieldset>
        @include('cliente.form',['submitButtonText'=>'Crear cliente'])
    </fieldset>
{!! Form::close() !!}

@endsection