<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $aviso->id !!}</p>
</div>

<!-- Tituloaviso Field -->
<div class="form-group">
    {!! Form::label('tituloaviso', 'Título:') !!}
    <p>{!! $aviso->tituloaviso !!}</p>
</div>

<!-- Texto Field -->
<div class="form-group">
    {!! Form::label('texto', 'Texto:') !!}
    <p>{!! $aviso->texto !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{!! $aviso->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{!! $aviso->updated_at !!}</p>
</div>

