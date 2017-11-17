<!-- Parcelas -->

<div class="row">
    
    

	<div class="container">
	
		<table class="table" id="tabelaLigacoes">
		    <thead>
		      <tr>
		        <th>Data/Hora</th>
		        <th>Duração</th>
		        <th></th>
		      </tr>
		    </thead>
			    <tbody>
					@forelse ($ligacoes as $ligacao)
						<tr>
							<td>{{$ligacao->datahora}}</td>
							<td>{{$ligacao->duracao}}</td>
						</tr>
					@empty	    			    
					@endforelse								      
			    </tbody>

	  	</table>
	</div>
</div>


