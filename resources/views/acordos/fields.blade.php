<!-- Valoracordado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valoracordado', 'Valoracordado:') !!}
    {!! Form::number('valoracordado', null, ['class' => 'form-control']) !!}
</div>

<!-- Valororiginal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valororiginal', 'Valororiginal:') !!}
    {!! Form::number('valororiginal', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacao', 'Observacao:') !!}
    {!! Form::textarea('observacao', null, ['class' => 'form-control']) !!}
</div>

<!-- Cliente Field -->
<!-- TO DO: esse campo deve ser preenchido via javascript após escolher aluno na datatable de alunos em uma modal pré-cadastro !-->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('aluno', 'Aluno:') !!}
    {!! Form::text('cliente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Escola Field -->
<!-- TO DO: esse campo deve ser preenchido via javascript após escolher escola na modal pré-cadastro !-->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('empresa', 'Empresa:') !!}
    {!! Form::text('empresa_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('acordos.index') !!}" class="btn btn-default">Cancel</a>
</div>
