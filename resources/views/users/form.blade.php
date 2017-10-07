<div class="form-group">
        <br/>
        {!! Form::label('name','Nombre',array('class' => 'col-md-2 control-label')) !!}

        <div class="col-md-6">
                {!!  Form::text('name',old('name'),['class'=>'form-control ','placeholder'=>'John Dae','required'=>'required']) !!}
        </div>
</div>

<div class="form-group">
        <br/>
        {!! Form::label('email','E-Mail',array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-6">
                {!!  Form::text('email',old('email'),['class'=>'form-control ','placeholder'=>'email@domain.com','required'=>'required','data-parsley-type'=>'email']) !!}
        </div>

</div>

<div class="form-group">
        <br/>
        {!! Form::label('rol','Rol',array('class' => 'col-md-2 control-label')) !!}
        <div class="col-md-6">
                {!! Form::select('rol_id', ['' => 'Seleccione un rol']+ $roles , $rol_id,
                ['id'=>'rol_id','class'=>'form-control','required'=>'required']) !!}
        </div>
</div>


<div class="form-group">
        <br/>
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-6">
                <a href="{{route('user.index')}}"><button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button></a>
                {!! Form::submit($submitButtonText,['class'=>'btn btn-primary btn-success']) !!}
        </div>
</div>
