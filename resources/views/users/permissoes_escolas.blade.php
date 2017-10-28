@extends('layouts.app')

<style> 

.datatable-user-crud {
    padding: 1em;
}

.dataTables_filter {
    display: none;
}


</style>

@section('content')
    <section class="content-header">
        <h1>
           Passo 2 - Gerenciando as permissões por ano
        </h1>
    </section>
    <div class="content">

        @include('adminlte-templates::common.errors')
    
        <div class="box box-primary">
            <div class="box-body">
                @include('perm_user_empresas.table')
            </div>
        </div>
        
        <div class="form-group col-sm-12">
            <!-- Links -->
            <a data-toggle="modal" class="btn btn-primary btn-success" href="#modalCriaPermissoes">
                <i class="fa fa-plus"></i> &nbsp; Criar nova <a>
            <a href="{!! route('users.index') !!}" class="btn btn-primary">Finalizar</a>
        </div>

    </div>
    @include('perm_user_empresas.modal')
@endsection
