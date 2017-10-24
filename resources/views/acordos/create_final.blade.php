@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Passo 3/3 - Assinalar Títulos a Serem Negociados e Inserir Acordo
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
            </div>

            <div class="box-body">                    
                {!! Form::open(['route' => 'acordos.store']) !!}

                    @include('titulos.table')

            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">                    
                @include('acordos.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection
