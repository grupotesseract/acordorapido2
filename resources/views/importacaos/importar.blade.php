@extends('layouts.app')

@section('content')   

<script>
    function carregaMensagens (sel,estado) {
        if (sel != 0) {
            $.ajax({
                type: 'GET',
                url: '/mensagens/'+sel+'/'+estado,
                
                success: function (data) {
                    // the next thing you want to do 
                    var $mensagens = $('#mensagens');
                    $mensagens.empty();

                    $.each(data, function (i, item) {
                        $mensagens.append($('<option>', { 
                            value: item.id,
                            text : item.titulo + ': '+item.mensagem
                        }));
                    });    
                }
            });
        }
    }
</script> 

<div class="container">   
    <div class="row">

    <?php 
        switch($estado) {
          case "azul":
            $bootstrapClass = "info";
            break;
          case "verde":
            $bootstrapClass = "success";
            break;
          case "amarelo":
            $bootstrapClass = "warning";
            break;
        }
    ?>
    @if(Session::has('flash_message_success'))
        <div class="alert alert-{{ $bootstrapClass }} alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
          <em>{!! session('flash_message') !!}</em>
        </div>
    @endif
    @if(Session::has('flash_message_error'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Erro!</h4>
          <em>{!! session('flash_message') !!}</em>
        </div>
    @endif
        <p class="errors">
          {!!$errors->first('excel')!!}
        </p>
    </div>


    <div class="row">
        <div class="col-sm-4">
            <h4>Escolha abaixo a planilha a ser importada</h4>
            {!! Form::open(array('url'=>'importa/'.$estado,'method'=>'POST', 'files'=>true)) !!}
            <div class="form-group ">        
                <label for="sel1">Escolha a escola:</label>
                <select class="form-control" name="escola" id="{{$estado}}" onchange="carregaMensagens(this.value,this.id);">
                    <option value="0"></option>
                    @forelse($escolas as $escola)
                    <option value="{{$escola->id}}">{{$escola->nome}}</option>
                    @empty 
                    <p>Sem escolas cadastradas</p>
                    @endforelse
                </select>
            </div>

            <div class="form-group">
                <label for="sel2">Escolha a mensagem:</label>
                <select class="form-control" name="mensagens" id="mensagens">

                </select>
            </div>
                 
            <div class="form-group">
                {!! Form::file('excel', ['required', 'class' => 'form-file']) !!}
            </div>
            <div class="col-xs-12 margin-t-1 text-right">
                <div class="col-xs-offset-3 col-xs-3">
                  {!! Form::submit('Enviar', array('class'=>'btn btn-primary btn-md')) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        @if(isset($titulos))
        <div class="col-sm-8">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Títulos Importados</h3>
                    <a class="btn btn-sm btn-default" href="{{ url('titulos/modulo/'.$importacao->modulo) }}"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ver todos </a>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    @include('partials.titulos', [ 'titulos' => $titulos ])
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection



