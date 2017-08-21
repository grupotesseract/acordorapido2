<table class="table table-striped table-hovered">
  <thead>
    <tr>
      <th>Módulo</th>
      <th>Número</th>
      <th>Cliente</th>
      <th>Vencimento</th>
      <th>Valor</th>
      <th>Importado em</th>
      <th>Ações Tomadas</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($titulos as $titulo)
    <tr>
      <td> <span class="label label-{{ $titulo->estado }}">{{ ucfirst($titulo->estado) }}</span></td>
      <td>{{ ucwords(strtolower($titulo->titulo)) }}</td>
      <td> {{ $titulo->cliente->nome }}</td>
      <td> {{ $titulo->created_at->format('d/m/Y H:i') }}</td>

      <td> {{ $titulo->valor }}</td>
      <td> {{ $titulo->created_at->format('d/m/Y H:i') }}</td>
      <td>  

        @foreach ($titulo->avisos as $aviso)
          @if (isset($aviso))
            @forelse  ($aviso->avisosenviados->where('tipodeaviso', 0) as $avisoenviado)            
              <span class="label label-{{ $aviso->estado }}"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
            @empty
            @endforelse
          @endif
        @endforeach


      </td>
      <td>
      <!-- <a href="/avisos/create" class="btn btn-sm btn-default"> <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Enviar SMS</a> -->
      <a class="btn btn-sm btn-default" href="{{ url('titulos/'.$titulo->id) }}"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> mais detalhes </a>

      </td>
    </tr>
    @endforeach
  </tbody>

</table>

