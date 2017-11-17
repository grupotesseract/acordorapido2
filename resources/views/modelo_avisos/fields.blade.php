<!-- User Id Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Empresa Id Field -->
<div class="form-group col-sm-6">
  <label for="sel1">Escolha a escola:</label>
  <select class="form-control" name="empresa_id" id="escola">
    @forelse($escolas as $escola)
      @if (isset($modeloAviso))
        <option value="{{$escola->id}}" {{$escola->id == $modeloAviso->empresa_id? 'selected':''}}>{{$escola->nome}}</option>
      @else
        <option value="{{$escola->id}}">{{$escola->nome}}</option>
      @endif
    @empty 
      <p>Sem escolas cadastradas</p>
    @endforelse
  </select>
</div>

<div class="form-group col-sm-6">
  <label for="tipo">Escolha a qual módulo a mensagem será enviada</label>  

      @if (isset($modeloAviso))
        {!! Form::select('tipo', ['Nenhum' => 'Nenhum', 'Azul' => 'Azul', 'Verde' => 'Verde', 'Amarelo' => 'Amarelo', 'Vermelho' => 'Vermelho'], $modeloAviso->tipo, ['class' => "form-control"]) !!}
      @else
        {!! Form::select('tipo', ['Nenhum' => 'Nenhum', 'Azul' => 'Azul', 'Verde' => 'Verde', 'Amarelo' => 'Amarelo', 'Vermelho' => 'Vermelho'], null, ['class' => "form-control"]) !!}

      @endif
</div>

<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo da Mensagem:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Mensagem Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('mensagem', 'Mensagem (máx 160 caracteres):') !!}
    {!! Form::textarea('mensagem', null, ['class' => 'form-control', "id"=>"corpo-sms", "maxlength"=>"160"]) !!}
    <p class="pull-left"> <span id="contador-caracteres" data-target="corpo-sms">160</span> caracteres disponiveis..  </p>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('modeloAvisos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
