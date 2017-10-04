@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Acordo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($acordo, ['route' => ['acordos.update', $acordo->id], 'method' => 'patch']) !!}

                        @include('acordos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection