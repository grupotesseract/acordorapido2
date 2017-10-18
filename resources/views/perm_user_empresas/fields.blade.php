<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Empresa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa_id', 'Empresa Id:') !!}
    {!! Form::text('empresa_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ano Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ano', 'Ano:') !!}
    {!! Form::text('ano', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('permUserEmpresas.index') !!}" class="btn btn-default">Cancel</a>
</div>
