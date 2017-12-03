<table class="table table-responsive" id="historicos-table">
    <thead>
        <th>Usuário</th>
        <th>Tipo</th>
    </thead>
    <tbody>
    @foreach($historicos as $historico)
        <tr>
            <td>{!! $historico->user->name !!}</td>
            <td>{!! $historico->tipo !!}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>