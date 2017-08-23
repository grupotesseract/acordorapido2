<div id="ligacao" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Efetuar Ligação Telefônica</h4>
      </div>

      {!! Form::open(array('url'=>'avisos/ligacao/','method'=>'POST')) !!}
      <input type="hidden" name="aviso_id" id="aviso_id" value=""/>
			      
      <div class="modal-body">
        <p>Atenção: não se esqueça de iniciar e pausar o cronômetro para marcar a duração da ligação telefônica</p>
    	<div class="input-group">
    		@include ('cronometro')
    	</div>
        <div class="input-group">
			<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
			<textarea placeholder="Observações" class="form-control" name="observacaoligacao" id="texto" rows="3"></textarea>
		</div>   
		<div class="col-xs-12 margin-t-1 text-right">
            <div class="col-xs-offset-3 col-xs-3">
        		{!! Form::submit('Salvar Ligação Telefônica', array('class'=>'btn btn-primary btn-md')) !!}
        	</div>
        </div>
      </div>
      

      {!! Form::close() !!}

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>
