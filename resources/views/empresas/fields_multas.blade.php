<div class="row">
	<div class="col-sm-12">
		<h3>Valores de Multas</h6>
	</div>

	<!-- MultaPorc Field -->
	<div class="form-group col-sm-6">
	    {!! Form::label('multaporc', 'Multa - Porcentagem após vencimento:') !!}
	    {!! Form::text('multaporc', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group col-sm-6">
	    {!! Form::label('multadiariaporc', 'Multa Diária - Porcentagem após vencimento:') !!}
	    {!! Form::text('multadiariaporc', null, ['class' => 'form-control']) !!}
	</div>
	
	<!-- Submit Field -->
	<div class="form-group col-sm-12">
	    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
	    <a href="{!! route('escolas.index') !!}" class="btn btn-default">Cancelar</a>
	</div>
</div>