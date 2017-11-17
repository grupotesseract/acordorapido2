@extends('layouts.app')

@section('content')
{!! Form::open(['route' => 'acordos.store']) !!}

    <section class="content-header">
        <h1>
            Módulo de Negociação - Editar Acordo
        </h1>
    </section>

    <div class="content">
        @include('adminlte-templates::common.errors')
        
        <div class="row">
            <div class="col-sm-6 ">
                <div class="box box-solid box-primary" data-widget="box-widget">
                    <div class="box-header">
                        <h3 class="box-title">{{$empresa->nome}}</h3>
                    </div>
                    <div class="box-body">      
                        <p>Cidade: {{$empresa->cidade}} </p>
                        <p>Estado: {{$empresa->estado}}</p>              
                        <p>Multa após vencimento: {{$empresa->multaporc}}% </p>
                        <p>Mora (juros diários sobre o valor acumulado): {{$empresa->multadiariaporc}}%</p>
                    </div>

                </div>          

            </div>

            <div class="col-sm-6">
                <div class="box box-solid box-primary" data-widget="box-widget">
                    <div class="box-header">
                        <h3 class="box-title">{{$aluno->nome}}</h3>
                    </div>
                    <div class="box-body">      
                        <p>Turma: {{$aluno->turma}} </p>
                        <p>Período: {{$aluno->periodo}}</p>              
                        <p>Responsável: {{$aluno->responsavel}} </p>
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
                <h3 class="box-title">Títulos Referentes ao Aluno: {{$aluno->nome}}</h3>
                

            <div class="box-body">                    
                    <input type="hidden" name="cliente_id" value="{{$aluno->id}}" />
                    <input type="hidden" name="empresa_id" value="{{$empresa->id}}" />
                    @include('titulos.table')

            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">                    
                @include('acordos.fields')

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

        <div class="box box-primary">
            <div class="box-body">                    
                @include('acordos.observacao')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @include('acordos.modaltelefone')
    

@endsection
