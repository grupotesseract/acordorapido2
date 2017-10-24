@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Passo 1/3 - Escolher Escola
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">                    
                {!! Form::open(['url' => 'storeempresa']) !!}
                    @include('acordos.empresas')
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
