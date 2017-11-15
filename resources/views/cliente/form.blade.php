<div class="form-group">
        <br/>
        {!! Form::label('name','Nombre',array('class' => 'col-md-2 control-label')) !!}

        <div class="col-md-6">
                {!!  Form::text('name',old('name'),['class'=>'form-control ','required'=>'required']) !!}
        </div>
</div>
<div class="form-group">
        <br/>
        {!! Form::label('razon_social','Razon social',array('class' => 'col-md-2 control-label')) !!}

        <div class="col-md-6">
                {!!  Form::text('razon_social',old('razon_social'),['class'=>'form-control ','required'=>'required']) !!}
        </div>
</div>
<div class="form-group">
        <br/>
        {!! Form::label('nit','Nit',array('class' => 'col-md-2 control-label')) !!}

        <div class="col-md-6">
                {!!  Form::text('nit',old('nit'),['class'=>'form-control ','required'=>'required']) !!}
        </div>
</div>
<div class="form-group">
        <br/>
        {!! Form::label('address','Dirección',array('class' => 'col-md-2 control-label')) !!}

        <div class="col-md-6">
                {!!  Form::text('address',old('address'),['class'=>'form-control ','required'=>'required']) !!}
        </div>
</div>
<div class="form-group">
        <br/>
        {!! Form::label('telephone','Teléfono',array('class' => 'col-md-2 control-label')) !!}

        <div class="col-md-6">
                {!!  Form::text('telephone',old('telephone'),['class'=>'form-control ','required'=>'required']) !!}
        </div>
</div>

<div class="form-group">
        <br/>
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-6">
                <a href="{{route('cliente.index')}}"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button></a>
                {!! Form::submit($submitButtonText,['class'=>'btn btn-primary btn-success']) !!}
        </div>
</div>
