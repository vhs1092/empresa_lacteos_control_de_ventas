@extends('adminlte::page')

@section('content')
<h3 class="title">Editar: </h3>

<div class="row">
    <div class=" col-xs-10 col-md-10 col-lg-10 col-md-offset-1">
        {!! Form::model($user,['method'=>'PATCH','action' => ['UsersController@update',$user->id],'class'=>'form-horizontal']) !!}

        <fieldset>
        @include('users.form',['submitButtonText'=>'Actualizar Usuario'])
        </fieldset>
        {!! Form::close() !!}
    </div>
</div>
@endsection

