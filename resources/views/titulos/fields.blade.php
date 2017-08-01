<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente Id:') !!}
    {!! Form::number('cliente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Empresa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa_id', 'Empresa Id:') !!}
    {!! Form::number('empresa_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Pago Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pago', 'Pago:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('pago', false) !!}
        {!! Form::checkbox('pago', '1', null) !!} 1
    </label>
</div>

<!-- Vencimento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vencimento', 'Vencimento:') !!}
    {!! Form::date('vencimento', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor', 'Valor:') !!}
    {!! Form::number('valor', null, ['class' => 'form-control']) !!}
</div>

<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Importacao Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('importacao_id', 'Importacao Id:') !!}
    {!! Form::number('importacao_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('titulos.index') !!}" class="btn btn-default">Cancel</a>
</div>
