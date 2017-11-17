<!-- Parcelas -->

<div class="row">   
    

	<div class="container">
	
		<table class="table" id="tabelaLigacoes">
		    <thead>
		      <tr>
		        <th>Data</th>
		        <th>Duração</th>
		        <th></th>
		      </tr>
		    </thead>
			    <tbody>
					@if (!empty($ligacoes))
						@foreach ($ligacoes as $ligacao)
							<tr>
								<td>{{ $ligacao->datahora }}</td>
								<td>{{ $ligacao->duracao }}</td>
								<td>
									<input type="hidden" name="datahora[]" value="{{ $ligacao->datahora }}">
								</td>
								<td>
									<input type="hidden" name="duracao[]" value="{{ $ligacao->duracao }}">
								</td>
							</tr>
						@endforeach								      
					@endif
			    </tbody>

	  	</table>
	</div>
</div>


