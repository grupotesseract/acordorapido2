@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Titulo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($titulo, ['route' => ['titulos.update', $titulo->id], 'method' => 'patch']) !!}

                        @include('titulos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection