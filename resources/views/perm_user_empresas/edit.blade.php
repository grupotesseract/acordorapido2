@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perm User Empresa
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($permUserEmpresa, ['route' => ['permUserEmpresas.update', $permUserEmpresa->id], 'method' => 'patch']) !!}

                        @include('perm_user_empresas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection