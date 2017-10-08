@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Criar Acordo
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
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

    @include('acordos.modalalunos')

@endsection
