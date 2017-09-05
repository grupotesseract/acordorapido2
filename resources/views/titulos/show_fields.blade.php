<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Módulo:') !!}
    <p>{!! $titulo->estado !!}</p>
</div>

<!-- Empresa Id Field -->
<div class="form-group">
    {!! Form::label('empresa', 'Escola:') !!}
    <p>{!! $titulo->empresa->nome !!}</p>
</div>

<!-- Pago Field -->
<div class="form-group">
    {!! Form::label('pago', 'Pago:') !!}
    <p>{!! $titulo->pago !!}</p>
</div>

<!-- Vencimento Field -->
<div class="form-group">
    {!! Form::label('vencimento', 'Vencimento:') !!}
    <p>{!! $titulo->vencimento !!}</p>
</div>

<!-- Valor Field -->
<div class="form-group">
    {!! Form::label('valor', 'Valor:') !!}
    <p>{!! $titulo->valor !!}</p>
</div>

<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Número do título:') !!}
    <p>{!! $titulo->titulo !!}</p>
</div>
