<!-- Valoracordado Field -->
<div class="form-group col-sm-6">
    <div id="input1" style="margin-bottom:4px;" class="clonedInput" value="1">
   
    	<form class="form-inline">

	    	<label class="sr-only" for="inlineFormInput">Parcela</label>
		    <input type="text" name="parcela" id="parcela" class="form-control mb-2 mr-sm-2 mb-sm-0 parcela" value="1" readonly="readonly" />	    
		  

	    	<label class="sr-only" for="inlineFormInputGroup">Valor</label>
	    	<div class="input-group mb-2 mr-sm-2 mb-sm-0">
	    		<span class="input-group-addon">
	                <span class="glyphicon glyphicon-usd"></span>
	            </span>			    
		    	<input type="text" name="valor" id="valor" class="form-control valor"/>
		    </div>


	    	<label class="sr-only" for="inlineFormInputGroup">Data</label>
		    <div class='input-group date' id='datetimepicker2'>
	            <span class="input-group-addon">
	                <span class="glyphicon glyphicon-calendar"></span>
	            </span>
	            <input type='text' class="form-control" id="calendario"/>
	        </div>

	    </form>
	    
    
    </div>
    
        <div>

            <button type="button" class="btn btn-default" id="btnAdd">
			  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			</button>

			<button type="button" class="btn btn-default" id="btnRemove" disabled="disabled">
			  <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			</button>
            
        </div>
    </form>
</div>

