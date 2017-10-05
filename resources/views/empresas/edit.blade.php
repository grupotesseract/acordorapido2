@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Escola</h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($empresa, ['route' => ['escolas.update', $empresa->id], 'method' => 'patch']) !!}

                        <div class="container-fluid">
                          @include('empresas.fields')
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
