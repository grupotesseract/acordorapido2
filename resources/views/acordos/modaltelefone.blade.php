<div id="ligacao" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Efetuar Ligação Telefônica</h4>
      </div>

      <input type="hidden" name="aviso_id" id="aviso_id" value=""/>
			      
      <div class="modal-body">
        <p>Atenção: não se esqueça de iniciar e pausar o cronômetro para marcar a duração da ligação telefônica</p>
    	<div class="input-group">
    		@include ('cronometro')
    	</div>       

    </div>      


      <div class="modal-footer">
    		  <button data-target="#ligacao" type="button" class="btn btn-default enviarLigacao" id="addLigacao" data-toggle="modal">
            Adicionar Ligação
          </button>         
      </div>
    </div>

  </div>
</div>
