<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $aviso->id !!}</p>
</div>

<!-- Tituloaviso Field -->
<div class="form-group">
    {!! Form::label('tituloaviso', 'Tituloaviso:') !!}
    <p>{!! $aviso->tituloaviso !!}</p>
</div>

<!-- Texto Field -->
<div class="form-group">
    {!! Form::label('texto', 'Texto:') !!}
    <p>{!! $aviso->texto !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $aviso->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $aviso->updated_at !!}</p>
</div>

