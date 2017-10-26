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

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
                        </div>


                   {!! Form::close() !!}
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

       <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Empresas</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    @include('users.permissions')
                </div>
            </div>
       </div>

   </div>
@endsection
