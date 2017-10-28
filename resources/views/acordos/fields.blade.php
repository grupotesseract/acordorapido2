<!-- Valoracordado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valoracordado', 'Valor Acordado:') !!}
    {!! Form::number('valoracordado', null, ['class' => 'form-control']) !!}
</div>

<!-- Valororiginal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valororiginal', 'Valor Original:') !!}
    
    <input type="text" class="form-control" name="valororiginal" value="{{ $valorTotalDivida }}" readonly="readonly">
</div>

