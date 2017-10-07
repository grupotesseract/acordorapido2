@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Controle de Disparos e Ligações Telefônicas</h1>  
    </section>
    {!! Form::open(array('url'=>'envialote/','method'=>'POST','name'=>'avisoform', 'id' => 'avisoform')) !!}
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('avisos.table')
            </div>
        </div>
    </div>
    

{!! Form::close() !!}

@include('avisos.modaltelefone')

@endsection

