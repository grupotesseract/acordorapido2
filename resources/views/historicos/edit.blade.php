@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Historico
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($historico, ['route' => ['historicos.update', $historico->id], 'method' => 'patch']) !!}

                        @include('historicos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection