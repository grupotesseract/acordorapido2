<table class="table table-responsive" id="historicos-table">
    <thead>
        <th>Usuário</th>
        <th>Tipo</th>
        <th>Data</th>
    </thead>
    <tbody>
    @foreach($historicos as $historico)
        <tr>
            <td>{!! $historico->user->name !!}</td>
            <td>{!! $historico->tipo !!}</td>
            <td>{!! $historico->created_at->format('d/m/Y H:i:s') !!}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>