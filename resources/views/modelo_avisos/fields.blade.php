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
      <option value="{{$escola->id}}">{{$escola->nome}}</option>
    @empty 
      <p>Sem escolas cadastradas</p>
    @endforelse
  </select>
</div>

<div class="form-group col-sm-6">
  <label for="sel1">Escolha a qual módulo a mensagem será enviada</label>
  <select class="form-control" name="tipo" id="escola">
      <option value="Nenhum">Nenhum</option>              
      <option value="Azul">Azul</option>
      <option value="Verde">Verde</option>
      <option value="Amarelo">Amarelo</option>
      <option value="Vermelho">Vermelho</option>
  </select>
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
