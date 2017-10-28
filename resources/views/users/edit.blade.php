@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="/css/tesseract.css">

@endsection


@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <h3>Informações Gerais</h3>
       {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    @include('users.fields', ['editando' => true])

                    <div class="col-xs-12">
                        <a id='btn-trocar-senha' class="btn btn-primary" href="javascript:habilitaCamposPassword()">
                            <i class="fa fa-edit"></i> Trocar senha
                        </a>
                    </div>
               </div>
           </div>
       </div>

       <h3>Permissões do usuário</h3>
       <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                        @include('users.permissions')
                </div>
            </div>
       </div>

       <h3>Empresas que tem acesso</h3>

       <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="datatable-user-crud">
                        @include('users.table')
                    </div>
                </div>
            </div>
       </div>

        <div class="row">
            <div class="text-center">
                @include('users.submit')
            </div>
        </div>

        {!! Form::close() !!}
   </div>
@endsection

<script>
    function habilitaCamposPassword() {
        $('input[type="password"]').removeAttr('disabled');
    }
</script>
