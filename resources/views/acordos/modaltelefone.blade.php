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
        <div class="col-sm-6">
          <div class="box box-solid box-primary" data-widget="box-widget">
            <div class="box-header">
                <h3 class="box-title">{{$aluno->nome}}</h3>
            </div>
            <div class="box-body">      
                <p>Série: {{$aluno->serie}} </p>
                <p>Email: {{$aluno->email}}</p>              
                <p>Responsável: {{$aluno->responsavel}} </p>
                <p>Celular 1: {{$aluno->celular}}</p>
                <p>Celular 2: {{$aluno->celular2}}</p>
                <p>Telefone 1: {{$aluno->telefone}}</p>
                <p>Telefone 2: {{$aluno->telefone2}}</p>
            </div>
          </div> 
        </div>
        <div class="col-sm-6">
          <div class="box box-solid box-primary" data-widget="box-widget">
            <div class="box-header">
                <h3 class="box-title">Informações de Títulos</h3>
            </div>
            <div class="box-body">      
                <p>Valor Bruto Total: <strong>{{$valorTotalBruto}}</strong></p>
                <p>Descontos Totais: <strong>{{$valorTotalDesconto}}</strong></p>
                <p>Valor Líquido Total: <strong>{{$valorTotalDescontado}}</strong></p>
                <p>Valor Atualizado Total: <strong>{{$valorTotalDivida}}</strong></p>
                <p>Valor Referência Total: <strong>{{number_format($valorTotalReferencia, 2, ',', '.')}}</strong></p>
                <p>Valor Cobrança Total: <strong>{{number_format($valorTotalCobranca, 2, ',', '.')}}</strong></p>
            </div>
          </div> 
        </div>
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
