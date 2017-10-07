
<!-- Escola Field -->
<!-- TO DO: esse campo deve ser preenchido via javascript após escolher escola na modal pré-cadastro !-->

<input type="hidden" name="empresa_id" id="empresa_id" value=""/>
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('empresa', 'Empresa:') !!}
    {!! Form::text('empresa_id', null, ['class' => 'form-control', 'readonly']) !!}
</div>

<!-- Cliente Field -->
<!-- TO DO: esse campo deve ser preenchido via javascript após escolher aluno na datatable de alunos em uma modal pré-cadastro !-->
<input type="hidden" name="cliente_id" id="cliente_id" value=""/>
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('aluno', 'Aluno') !!}
    <a data-target="#alunos" class="btn btn-default btn-xs" data-toggle="modal"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></a>
    {!! Form::text('cliente_id', null, ['class' => 'form-control','readonly']) !!}
</div>

<!-- Valoracordado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valoracordado', 'Valor Acordado:') !!}
    {!! Form::number('valoracordado', null, ['class' => 'form-control']) !!}
</div>

<!-- Valororiginal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valororiginal', 'Valor Original:') !!}
    {!! Form::number('valororiginal', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacao', 'Observação:') !!}
    {!! Form::textarea('observacao', null, ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('acordos.index') !!}" class="btn btn-default">Cancel</a>
</div>
