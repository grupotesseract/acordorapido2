@extends('layouts.app')



@section('content')
    <section class="content-header">
        <h1 class="pull-left">Titulos</h1>
        <!-- <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('titulos.create') !!}">Add New</a>
        </h1> -->
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('titulos.table')
            </div>
        </div>
    </div>
    <style>
        .content-wrapper {
            @if ($estado == 'azul')
                background-color: #ecf0f5;
            @elseif ($estado == 'verde')
                background-color: #b6f3b8;
            @elseif ($estado == 'amarelo')
                background-color: #eacb98;
            @elseif ($estado == 'vermelho')
                background-color: #fdc9c9;
            @endif
        }
    </style>
@endsection

