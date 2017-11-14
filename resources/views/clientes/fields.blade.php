<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>


<!-- Turma Field -->
<div class="form-group col-sm-6">
    {!! Form::label('turma', 'Turma:') !!}
    {!! Form::text('turma', null, ['class' => 'form-control']) !!}
</div>

<!-- Periodo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo', 'Periodo:') !!}
    {!! Form::text('periodo', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsavel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsavel', 'Responsável:') !!}
    {!! Form::text('responsavel', null, ['class' => 'form-control']) !!}
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('celular', 'Celular:') !!}
    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefone', 'Telefone:') !!}
    {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefone2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefone2', 'Telefone Complementar:') !!}
    {!! Form::text('telefone2', null, ['class' => 'form-control']) !!}
</div>

<!-- Celular2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('celular2', 'Celular Complementar:') !!}
    {!! Form::text('celular2', null, ['class' => 'form-control']) !!}
</div>

<!-- Rg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ra', 'RA:') !!}
    {!! Form::text('ra', null, ['class' => 'form-control']) !!}
</div>

<!-- Negativado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('negativado', 'Negativado:') !!}
    {!! Form::checkbox('negativado', 'value', $cliente->negativado) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('alunos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
