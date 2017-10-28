@extends('layouts.app')


@section('css')

<link rel="stylesheet" href="/css/tesseract.css">

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Criando um novo usuário
        </h1>
    </section>
    <div class="content">
        {!! Form::open(['route' => 'users.store']) !!}

        @include('adminlte-templates::common.errors')

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="form-fields">
                        @include('users.fields')
                    </div>
                </div>
            </div>
        </div>
    
        <h3>Selecione as escolas que esse usuário terá acesso</h3>

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="datatable-user-crud">
                        @include('users.table')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="text-center">
                @include('users.submit')
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
