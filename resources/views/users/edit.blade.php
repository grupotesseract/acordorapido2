@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Usuário
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                        @include('users.fields')

               </div>
           </div>
       </div>

       <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Permissões</h3>
            </div>
            <div class="box-body">
                <div class="row">
                        @include('users.permissions')
                </div>
            </div>
       </div>
        @include('users.submit')
        {!! Form::close() !!}
   </div>
@endsection
