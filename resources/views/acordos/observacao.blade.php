<!-- Observacao Field -->
@if (empty($acordo))
	<div class="form-group col-sm-12 col-lg-12">
	    {!! Form::label('observacao', 'Histórico do Contato:') !!}
	    {!! Form::textarea('observacao', null, ['class' => 'form-control']) !!}
	</div>
@else
	<div class="form-group col-sm-12 col-lg-12">
	    {!! Form::label('observacao', 'Histórico do Contato:') !!}
	    {!! Form::textarea('observacao', $acordo->observacao, ['class' => 'form-control']) !!}
	</div>
@endif


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('acordos.index') !!}" class="btn btn-default">Cancelar</a>
    <button data-target="#ligacao" type="button" class="btn btn-warning" id="addLigacao" data-toggle="modal">Salvar Ligação Telefônica</button>
</div>
