<table class="table table-responsive" id="avisos-table">
    <thead>
        <th>Titulo</th>
        <th>Texto</th>
        <th>User Id</th>
        <th>Cliente Id</th>
        <th>Titulo Id</th>
        <th>Status</th>
        <th>Estado</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($avisos as $aviso)
        <tr>
            <td>{!! $aviso->titulo !!}</td>
            <td>{!! $aviso->texto !!}</td>
            <td>{!! $aviso->user_id !!}</td>
            <td>{!! $aviso->cliente_id !!}</td>
            <td>{!! $aviso->titulo_id !!}</td>
            <td>{!! $aviso->status !!}</td>
            <td>{!! $aviso->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['avisos.destroy', $aviso->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('avisos.show', [$aviso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('avisos.edit', [$aviso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>