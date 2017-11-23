<!-- Valoracordado Field -->

@if (empty($acordo))

	<!-- Valororiginal Field -->
	<div class="form-group col-sm-6">
	    {!! Form::label('valororiginal', 'Valor Original:') !!}
	    
	    <input type="text" class="form-control" name="valororiginal" value="{{ $valorTotalDivida }}" readonly="readonly">
	</div>
	
	<div class="form-group col-sm-6">
	    {!! Form::label('valoracordado', 'Valor Acordado:') !!}
	    {!! Form::text('valoracordado', $valorTotalDivida, ['class' => 'form-control', 'id' => 'valoracordado']) !!}
	</div>
@else

	<!-- Valororiginal Field -->
	<div class="form-group col-sm-6">
	    {!! Form::label('valororiginal', 'Valor Original:') !!}
	    
	    <input type="text" class="form-control" name="valororiginal" value="{{ $acordo->valororiginal }}" readonly="readonly">
	</div>
	
	<div class="form-group col-sm-6">
	    {!! Form::label('valoracordado', 'Valor Acordado:') !!}
	    {!! Form::text('valoracordado', $acordo->valoracordado, ['class' => 'form-control', 'id' => 'valoracordado']) !!}
	</div>
	
@endif

