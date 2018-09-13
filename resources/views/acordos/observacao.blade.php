<!-- Observacao Field -->
@if (empty($acordo))
	<div class="form-group col-sm-12 col-lg-12">
	    {!! Form::label('observacao', 'Histórico do Contato:') !!}
	    {!! Form::textarea('observacao', null, ['class' => 'form-control', 'required']) !!}
	</div>
@else
	<div class="form-group col-sm-12 col-lg-12">
	    {!! Form::label('observacao', 'Histórico do Contato:') !!}
	    {!! Form::textarea('observacao', $acordo->observacao, ['class' => 'form-control', 'required']) !!}
	</div>
@endif


@if ($acordo->situacao !== 'Acordo Feito')
	<!-- Submit Field -->
	<div class="form-group col-sm-12">
	    {!! Form::submit('Salvar', ['class' => 'btn btn-primary botaoSalvar', 'disabled' => 'disabled']) !!}
	    
	    <button data-target="#ligacao" type="button" class="btn btn-warning finalizaLigacao" id="finalizaLigacao" data-toggle="modal" disabled="disabled">Salvar Ligação Telefônica</button>
	</div>
@endif
