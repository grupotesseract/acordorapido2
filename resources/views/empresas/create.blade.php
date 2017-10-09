@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Empresa
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                {!! Form::open(['route' => 'escolas.store']) !!}

                @include('empresas.fields')

            </div>
        </div>

        <div class="box box-primary">

            <div class="box-body">

                @include('empresas.fields_multas')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
