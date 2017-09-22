@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Avisos</h1>  
        <h1 class="pull-right">
            <button class="btn btn-primary pull-left" style="margin-top: -10px;margin-bottom: 5px" onclick="checkAll()">Selecionar Todos</button>
        </h1> 
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

