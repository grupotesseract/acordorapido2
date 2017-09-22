<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $contato->id !!}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $contato->nome !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $contato->email !!}</p>
</div>

<!-- Escola Field -->
<div class="form-group">
    {!! Form::label('escola', 'Escola:') !!}
    <p>{!! $contato->escola !!}</p>
</div>

<!-- Mensagem Field -->
<div class="form-group">
    {!! Form::label('mensagem', 'Mensagem:') !!}
    <p>{!! $contato->mensagem !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Enviado em:') !!}
    <p>{!! $contato->created_at->format('d/m/Y h:i:s A') !!}</p>
</div>


