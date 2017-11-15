<div class="form-group">
        <br/>
        {!! Form::label('name','Nombre',array('class' => 'col-md-2 control-label')) !!}

        <div class="col-md-6">
                {!!  Form::text('name',old('name'),['class'=>'form-control ','required'=>'required']) !!}
        </div>
</div>
<div class="form-group">
        <br/>
        {!! Form::label('description','Descripción',array('class' => 'col-md-2 control-label')) !!}

        <div class="col-md-6">
                {!!  Form::textarea('description',old('description'),['class'=>'form-control ','placeholder'=>'Agrega una descripción','required'=>'required']) !!}
        </div>
</div>

<div class="form-group">
        <br/>
        {!! Form::label('tipo','Tipo de Operación',array('class' => 'col-md-2 control-label')) !!}


           <div class="form-group-sm col-sm-6 required ">
        {!! Form::select('tipo', $tipo, null, [ 'class' => 'form-control selectpicker']) !!}
        <p class="errors">{!!$errors->first('tipo')!!}</p>
    </div>

</div>
<div class="form-group">
        <br/>
        {!! Form::label('maneja_cliente','Maneja cliente',array('class' => 'col-md-2 control-label')) !!}


           <div class="form-group-sm col-sm-6 required ">
        {!! Form::select('maneja_cliente', $maneja_cliente, null, [ 'class' => 'form-control selectpicker']) !!}
        <p class="errors">{!!$errors->first('maneja_cliente')!!}</p>
    </div>

</div>
<div class="form-group">
        <br/>
        {!! Form::label('correlativo','Correlativo',array('class' => 'col-md-2 control-label')) !!}

        <div class="col-md-6">
                {!!  Form::number('correlativo',old('correlativo'),['class'=>'form-control ','required'=>'required']) !!}
        </div>
</div>

<div class="form-group">
        <br/>
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-6">
                <a href="{{route('tipo_transaccion.index')}}"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button></a>
                {!! Form::submit($submitButtonText,['class'=>'btn btn-primary btn-success']) !!}
        </div>
</div>
