<div class="row">
	<div class="col-sm-12">
		<h3>Valores de Multas</h6>
	</div>

	<!-- MultaPorc Field -->
	<div class="form-group col-sm-6">
	    {!! Form::label('multaporc', 'Multa - Valor Fixo após vencimento (porcentagem):') !!}
	    {!! Form::number('multaporc', null, ['class' => 'form-control']) !!}
	</div>

	<!-- MultaPorc Field -->
	<div class="form-group col-sm-6">
	    {!! Form::label('multavalor', 'Multa - Valor Fixo após vencimento:') !!}
	    {!! Form::number('multavalor', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col-sm-6">
	    {!! Form::label('multadiariaporc', 'Multa Diária - Valor Fixo após vencimento (porcentagem):') !!}
	    {!! Form::number('multadiariaporc', null, ['class' => 'form-control']) !!}
	</div>

	<!-- MultaPorc Field -->
	<div class="form-group col-sm-6">
	    {!! Form::label('multadiariavalor', 'Multa Diária - Valor Fixo após vencimento:') !!}
	    {!! Form::number('multadiariavalor', null, ['class' => 'form-control']) !!}
	</div>
	<!-- Submit Field -->
	<div class="form-group col-sm-12">
	    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
	    <a href="{!! route('escolas.index') !!}" class="btn btn-default">Cancelar</a>
	</div>
</div>