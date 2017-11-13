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
                {!!  Form::textarea('description',old('description'),['class'=>'form-control ','placeholder'=>'Agrega una descripción']) !!}
        </div>
</div>

<div class="form-group">
        <br/>
        {!! Form::label('id_tipo_producto','Tipo de producto',array('class' => 'col-md-2 control-label')) !!}


           <div class="form-group-sm col-sm-6 required ">
        {!! Form::select('id_tipo_producto', $tipos, null, [ 'class' => 'form-control selectpicker']) !!}
        <p class="errors">{!!$errors->first('state_id')!!}</p>
    </div>

</div>
<div class="form-group">
        <br/>
        {!! Form::label('unidad','Unidad',array('class' => 'col-md-2 control-label')) !!}

        <div class="col-md-6">
                {!!  Form::text('unidad',old('unidad'),['class'=>'form-control']) !!}
        </div>
</div>
<div class="form-group">
        <br/>
        {!! Form::label('weight','Peso',array('class' => 'col-md-2 control-label')) !!}

        <div class="col-md-6">
                {!!  Form::text('weight',old('weight'),['class'=>'form-control']) !!}
        </div>
</div>
<div class="form-group">
        <br/>
        {!! Form::label('stock','Stock',array('class' => 'col-md-2 control-label')) !!}

        <div class="col-md-6">
                {!!  Form::number('stock',old('stock'),['class'=>'form-control ','required'=>'required']) !!}
        </div>
</div>

<div class="form-group">
        <br/>
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-6">
                <a href="{{route('producto.index')}}"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button></a>
                {!! Form::submit($submitButtonText,['class'=>'btn btn-primary btn-success']) !!}
        </div>
</div>
