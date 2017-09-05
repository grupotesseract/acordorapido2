{!! Form::open(['route' => ['avisos.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>    
    
    <a href="avisos/sms/{{$id}}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-comment"></i>
    </a>

    <a data-target="#ligacao" data-id="{{$id}}" class="enviarligacao btn btn-default btn-xs" data-toggle="modal"><i class="glyphicon glyphicon-earphone" alt="Efetuar Ligação Telefônica" aria-hidden="true"></i></a>

    <a href="{{ route('avisos.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('avisos.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Tem certeza?')"
    ]) !!}
</div>
{!! Form::close() !!}
