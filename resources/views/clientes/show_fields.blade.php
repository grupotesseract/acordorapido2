<!-- Nome Field -->
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('nome', 'Nome:') !!}
        <p>{!! $cliente->nome !!}</p>
    </div>

    <div class="form-group col-sm-6">
        <h3><span class="glyphicon glyphicon-earphone"></span> {!! $cliente->contato !!}</h3>
    </div>
</div>

<!-- Rg Field -->
<div class="form-group">
    {!! Form::label('rg', 'Rg:') !!}
    <p>{!! $cliente->rg !!}</p>
</div>

<!-- Turma Field -->
<div class="form-group">
    {!! Form::label('turma', 'Turma:') !!}
    <p>{!! $cliente->turma !!}</p>
</div>

<!-- Periodo Field -->
<div class="form-group">
    {!! Form::label('periodo', 'Período:') !!}
    <p>{!! $cliente->periodo !!}</p>
</div>

<!-- Responsavel Field -->
<div class="form-group">
    {!! Form::label('responsavel', 'Responsável:') !!}
    <p>{!! $cliente->responsavel !!}</p>
</div>

<div class="row">
    <!-- Celular Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('celular', 'Celular:') !!}
        <p>{!! $cliente->celular !!}</p>
    </div>

    @if( $cliente->celular2)
    <!-- Celular2 Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('celular2', 'Celular2:') !!}
        <p>{!! $cliente->celular2 !!}</p>
    </div>
    @endif
</div>

<div class="row">
    <!-- Telefone Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('telefone', 'Telefone:') !!}
        <p>{!! $cliente->telefone !!}</p>
    </div>

    @if( $cliente->telefone2)
    <!-- Telefone2 Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('telefone2', 'Telefone2:') !!}
        <p>{!! $cliente->telefone2 !!}</p>
    </div>
    @endif
</div>

