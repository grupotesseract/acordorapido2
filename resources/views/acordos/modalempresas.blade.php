<div id="alunos" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Escolher aluno</h4>
      </div>

      <input type="hidden" name="aviso_id" id="aviso_id" value=""/>
                  
      <div class="modal-body">        
            @include('empresas.table')        
      </div>

      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Avançar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>
