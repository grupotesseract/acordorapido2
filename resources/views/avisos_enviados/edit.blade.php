@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Avisos Enviado
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($avisosEnviado, ['route' => ['avisosEnviados.update', $avisosEnviado->id], 'method' => 'patch']) !!}

                        @include('avisos_enviados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection