<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Aviso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aviso_id', 'Aviso Id:') !!}
    {!! Form::text('aviso_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipodeaviso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipodeaviso', 'Tipodeaviso:') !!}
    {!! Form::text('tipodeaviso', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('avisosEnviados.index') !!}" class="btn btn-default">Cancelar</a>
</div>
