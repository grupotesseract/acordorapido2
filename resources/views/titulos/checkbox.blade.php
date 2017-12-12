<!--
<style>
    td input[type="checkbox"] {
        float: left;
        margin: 0 auto;
        width: 100%;
    }
</style>

<input type="checkbox" id="titulosCheckbox" name="titulos[]" value="{{$valor}}" /> -->
<!-- 
<?php 
  $vencimento = Carbon\Carbon::createFromFormat('d/m/Y', $vencimento);
  $hoje = Carbon\Carbon::now();

  $diff = $vencimento->diffInDays($hoje);
  $taxa = ($empresa['multadiariaporc']) / 100;
  $valorTitulo = str_replace(',', '.', str_replace('.', '', $valordescontado));

  $valorAposVencimento = $valorTitulo * ($empresa['multaporc'] / 100);

  $potencia = pow(1 + $taxa, $diff);
  $valortotal = $valorAposVencimento + ($valorTitulo * $potencia);

?> -->


  
  <a class="btn btn-xs btn-info" onclick="javascript:selecionarTitulo(event,{{ $calculadosemformato }}, {{ $id }})"> <i class="fa fa-plus"></i> Adicionar </a>
  <input type="hidden" name="valor" disabled value="{{ $calculadosemformato }}"> 

