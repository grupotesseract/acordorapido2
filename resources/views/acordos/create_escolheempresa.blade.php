@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Passo 1/3 - Escolher Escola e Ano
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        
        {!! Form::open(['url' => 'storeempresa']) !!}
        
        <div class="box box-primary">

            <div class="box-body">                    
                    @include('acordos.empresas')
            </div>
        </div>
        <div class="box box-primary">

            <div class="box-body">                    
                {{ Form::label('ano', 'Escolha o Ano') }}
                {{ Form::select('ano', $anos) }}
            </div>
        </div>

        <div class="box">                    
            <div class="box-body">                    
                {!! Form::submit('Avançar', ['class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection
