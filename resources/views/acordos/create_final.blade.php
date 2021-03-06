
@extends('layouts.app')

@section('content')
{!! Form::open(['route' => 'acordos.store']) !!}

    <section class="content-header">
        <h1>
            Passo 3/3 - Assinalar Títulos a Serem Negociados e Inserir Acordo
        </h1>
    </section>

    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        
        <div class="row">
            <div class="col-sm-6 ">
                <div class="box box-solid box-primary" data-widget="box-widget">
                    <div class="box-header">
                        <h3 class="box-title">{{$empresa->nome}}</h3>
                    </div>
                    <div class="box-body">      
                        <p>Cidade: {{$empresa->cidade}} </p>
                        <p>Estado: {{$empresa->estado}}</p>
                        <p>Responsável pela Escola: {{$empresa->responsavel}}</p>
                        <p>Telefone: {{$empresa->telefone}}</p>
                        <p>Email: {{$empresa->email}}</p>
                    </div>

                </div>          

            </div>

            <div class="col-sm-6">
                <div class="box box-solid box-primary" data-widget="box-widget">
                    <div class="box-header">
                        <h3 class="box-title">{{$aluno->nome}}</h3>
                    </div>
                    <div class="box-body">      
                        <p>Série: {{$aluno->serie}} </p>
                        <p>Email: {{$aluno->email}}</p>              
                        <p>Responsável: {{$aluno->responsavel}} </p>
                        <p>CPF Responsavel: {{$aluno->cpf_responsavel}} </p>
                        <p>Celular 1: {{$aluno->celular}}</p>
                        <p>Celular 2: {{$aluno->celular2}}</p>
                        <p>Telefone 1: {{$aluno->telefone}}</p>
                        <p>Telefone 2: {{$aluno->telefone2}}</p>
                    </div>

                </div> 
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Ligações Telefônicas</h3>

                <button data-target="#ligacao" type="button" class="btn btn-default" id="addLigacao" data-toggle="modal">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>                    

                <button type="button" class="btn btn-default" id="removeLigacao">
                  <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                </button>
                    
            </div>
            <div class="box-body">                    
                @include('acordos.ligacoes')
            </div>
        </div>

        <div class="restanteInfos" style="display: none;">
            <div class="box box-primary">           
                <div class="box-header">
                    <h3 class="box-title">Títulos Referentes ao Aluno: {{$aluno->nome}}</h3>
                    

                <div class="box-body">                    
                        <input type="hidden" name="cliente_id" value="{{$aluno->id}}" />
                        <input type="hidden" name="empresa_id" value="{{$empresa->id}}" />
                        <div class="titulosSelecionados">
                            @foreach ($titulos as $titulo)
                                <input id="titulo{{$titulo->id}}"" name="titulos[]" value="{{$titulo->id}}" type="hidden">
                            @endforeach
                        </div>
                        
                        @include('titulos.table')


                </div>
            </div>

            <div class="box box-primary">
                <div class="box-body">                    
                    <p>Valor Bruto Total: <strong>{{$valorTotalBruto}}</strong></p>
                    <p>Descontos Totais: <strong>{{$valorTotalDesconto}}</strong></p>
                    <p>Valor Líquido Total: <strong>{{$valorTotalDescontado}}</strong></p>
                    <p>Valor Atualizado Total: <strong>{{$valorTotalDivida}}</strong></p>
                    <p>Valor Referência Total: <strong>{{number_format($valorTotalReferencia, 2, ',', '.')}}</strong></p>
                    <p>Valor Cobrança Total: <strong>{{number_format($valorTotalCobranca, 2, ',', '.')}}</strong></p>

                </div>
            </div>

            <div class="box box-primary">
                <div class="box-body">                    
                    @include('acordos.fields')

                </div>
            </div>

            <div class="box box-primary">
                <div class="box-body">                    
                    <div class="col-sm-6">
                        <input type="radio" class="radioAcordo" name="retornoacordo" value="Acordo Feito"> Acordo Feito <br>
                        <input type="radio" class="radioAcordo" name="retornoacordo" value="Contato sem Acordo">Contato sem Acordo
                    </div>

                    <div class="col-sm-6">
                        {!! Form::label('data_retorno', 'Data de Retorno:') !!}    
                        
                        <input type="text" id="dataRetorno" class="form-control escolherData" name="data_retorno" placeholder="Data de Retorno" style="position: relative; z-index: 100000;"/>
                    </div>

                </div>
            </div>
                        
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Parcelas</h3>

                        <button type="button" class="btn btn-default" id="btnAdd">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>

                        <button type="button" class="btn btn-default" id="btnRemove" disabled="disabled">
                          <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                        </button>
                        
                </div>
                <div class="box-body">                    
                    @include('acordos.parcelas')

                </div>
            </div>


            <div class="box box-primary">
                <div class="box-body">                    
                    @include('acordos.observacao')
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

    @include('acordos.modaltelefone')
    

@endsection
