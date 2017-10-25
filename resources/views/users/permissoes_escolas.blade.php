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
           Passo 2 - Gerenciando as permissões para cada Empresa
        </h1>
    </section>
    <div class="content">

        @include('adminlte-templates::common.errors')
    
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="datatable-user-crud">
                        @include('perm_user_empresas.table')
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            <!-- Links -->
            <a data-toggle="modal" class="btn btn-primary btn-success" href="#modalCriaPermissoes">
                <i class="fa fa-plus"></i> &nbsp; Criar nova <a>
            <a href="{!! route('users.index') !!}" class="btn btn-primary">Finalizar</a>
        </div>

    </div>


<!-- Modal -->
  <div class="modal fade" id="modalCriaPermissoes" role="dialog">
    <div class="modal-dialog">
      {!! Form::open(['route' => 'permUserEmpresas.store']) !!}


      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Criando uma nova permissao para o Usuário {{ $user->name }}</h4>
        </div>
        <div class="modal-body">
            <div class="form-group text-center">
                {{ Form::label('empresa_id', 'Selecione a empresa: ', ['class' => 'col-xs-4']) }}
                    
                {{ Form::select('empresa_id', $user->empresas()->pluck('nome', 'id'), ['class' => 'form-control col-xs-8'] ) }}
            </div>
            <div class="form-group text-center">
                {{ Form::label('ano', 'Selecione o ano: ', ['class' => 'col-xs-4']) }}
                {{ Form::selectRange(
                    'ano', 
                    \Carbon\Carbon::now()->addYears(-10)->year, 
                    \Carbon\Carbon::now()->addYears(1)->year,
                    ['class' => 'form-control col-xs-8']
                    ) 
                }}
            </div>
            {{ Form::hidden('user_id', $user->id) }}

        </div>
        <div class="modal-footer">

            <div class="col-xs-6 text-center">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Confirmar 
                </button>
            </div>
            <div class="col-xs-6 text-center">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">
                    <i class="fa fa-trash"></i> Cancelar 
                </button>
            </div>
          
        </div>

      </div>
      {!! Form::close() !!}
    </div>
  </div> 



@endsection
