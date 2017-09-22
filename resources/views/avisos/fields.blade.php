<!-- Tituloaviso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tituloaviso', 'Título da Mensagem:') !!}
    {!! Form::text('tituloaviso', null, ['class' => 'form-control']) !!}
</div>

<!-- Texto Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('texto', 'Mensagem:') !!}
    {!! Form::textarea('texto', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('avisos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
