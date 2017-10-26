
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
