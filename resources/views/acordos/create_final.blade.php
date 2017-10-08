@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Passo 2/2 - Assinalar Títulos a Serem Negociados e Inserir Acordo
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary" data-widget="box-widget">
            
            <div class="box-header">
                <h3 class="box-title">Títulos Referentes ao Aluno: {{$aluno->nome}}</h3>
            </div>

            <div class="box-primary-body">                    
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
