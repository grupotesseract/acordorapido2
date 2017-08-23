@extends('layouts.app')

@section('content')
{!! Form::open(array('url'=>'envialote/','method'=>'POST','name'=>'avisoform')) !!}
    <section class="content-header">
        <h1 class="pull-left">Avisos</h1>
        <h1 class="pull-right">
           <!-- <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('avisos.create') !!}">Incluir</a> -->
            {!! Form::submit('Enviar SMS Marcados', array('class'=>'btn btn-primary pull-right', 'style'=>'margin-top: -10px;margin-bottom: 5px')) !!}
           
        </h1>
    </section>
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

@endsection

