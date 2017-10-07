@extends('adminlte::page')

@section('content')

{!! Form::open(['route'=> 'user.store','class'=>'form-horizontal']) !!}
    <fieldset>
        @include('users.form',['submitButtonText'=>'Crear  Usuario','roles'=>$roles])
    </fieldset>
{!! Form::close() !!}

@endsection