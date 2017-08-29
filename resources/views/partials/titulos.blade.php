<table class="table table-striped table-hovered">
  <thead>
    <tr>
      <th>Número</th>
      <th>Cliente</th>
      <th>Vencimento</th>
      <th>Valor</th>
      <th>Importado por</th>
      <th>Importado em</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($titulos as $titulo)
    <tr>      
      <td>{{ ucwords(strtolower($titulo->titulo)) }}</td>
      <td> {{ $titulo->cliente->nome }}</td>
      <td> {{ $titulo->vencimento }}</td>
      <td> {{ $titulo->valor }}</td>
      <td> {{ $importacao->user->name }}</td>
      <td> {{ $importacao->created_at->format('d/m/Y H:i') }}</td>
      
      <td>
      <!-- <a href="/avisos/create" class="btn btn-sm btn-default"> <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Enviar SMS</a> -->
      <a class="btn btn-sm btn-default" href="{{ url('titulos/'.$titulo->id) }}"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> mais detalhes </a>

      </td>
    </tr>
    @endforeach
  </tbody>

</table>

