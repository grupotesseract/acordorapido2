@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Modelo Aviso
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($modeloAviso, ['route' => ['modeloAvisos.update', $modeloAviso->id], 'method' => 'patch']) !!}

                        @include('modelo_avisos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection