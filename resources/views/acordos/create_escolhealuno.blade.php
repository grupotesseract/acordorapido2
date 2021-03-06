@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Passo 2/3 - Escolher Aluno
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">                    
                {!! Form::open(['url' => 'storealuno']) !!}
                    <input type="hidden" name="empresa" value="{{$empresa->id}}">
                    @include('acordos.alunos')
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
