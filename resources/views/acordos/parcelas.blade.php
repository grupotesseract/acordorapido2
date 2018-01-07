<!-- Parcelas -->

<div class="row">
	
	<div class="form-group">
		<div class="form-group col-sm-6">		
			
				<input type='number' id="numeroInicial" class="form-control" placeholder="Número de Parcelas" />
				
				<input type='text' id="dataInicial" class="form-control 
				escolherData" placeholder="Data 1ª Parcela" style="position: relative; z-index: 100000;" />

				<button type="button" class="btn btn-default" id="botaoParcelas">
	              Calcular
	            </button>

		</div>
	</div>
</div>

<div class="row">
    
	@if (!empty($parcelas))
		@foreach ($parcelas as $parcela)
			<div id="input{{$parcela->numparcela}}" class="col-sm-6 clonedInput" value="{{$parcela->numparcela}}">
			    <div style="margin-bottom:4px;" id="box" class="box box-primary">	   

			    	<label class="sr-only" for="inlineFormInput">Parcela</label>
				    <input type="text" id="parcela{{$parcela->numparcela}}" name="parcela[]" class="form-control mb-2 mr-sm-2 mb-sm-0" value="{{$parcela->numparcela}}" readonly="readonly" />	    
				  

			    	<label class="sr-only" for="inlineFormInputGroup">Valor</label>
			    	<div class="input-group mb-2 mr-sm-2 mb-sm-0" id='valor{{$parcela->numparcela}}'>
			    		<span class="input-group-addon">
			                <span class="glyphicon glyphicon-usd"></span>
			            </span>			    
				    	<input type="text" name="valor[]" value="{{$parcela->valorparcela}}" class="form-control valor"/>
				    </div>


			    	<label class="sr-only" for="inlineFormInputGroup">Data</label>
				    <div class='input-group date' id='datetimepicker{{$parcela->numparcela}}'>
			            <span class="input-group-addon">
			                <span class="glyphicon glyphicon-calendar"></span>
			            </span>
			            <input type='text' name="data[]" value="{{$parcela->dataparcela}}" id="calendario{{$parcela->numparcela}}" class="form-control escolherData"/>
			        </div>	  
			    </div>
			</div>  
		@endforeach
	@else
		<div id="input1" class="col-sm-6 clonedInput" value="1">
			<div style="margin-bottom:4px;" id="box" class="box box-primary">
		    	<label class="sr-only" for="inlineFormInput">Parcela</label>
			    <input type="text" id="parcela1" name="parcela[]" class="form-control mb-2 mr-sm-2 mb-sm-0" value="1" readonly="readonly" />	    
			  

		    	<label class="sr-only" for="inlineFormInputGroup">Valor</label>
		    	<div class="input-group mb-2 mr-sm-2 mb-sm-0" id='valor1'>
		    		<span class="input-group-addon">
		                <span class="glyphicon glyphicon-usd"></span>
		            </span>			    
			    	<input type="text" name="valor[]" class="form-control valor"/>
			    </div>


		    	<label class="sr-only" for="inlineFormInputGroup">Data</label>
			    <div class='input-group date' id='datetimepicker1'>
		            <span class="input-group-addon">
		                <span class="glyphicon glyphicon-calendar"></span>
		            </span>
		            <input type='text' name="data[]" id="calendario1" class="form-control escolherData"/>
		        </div>	    
	    
	    </div>
	    
	</div>
	@endif
</div>


