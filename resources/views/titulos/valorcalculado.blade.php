<?php 
  $vencimento = Carbon\Carbon::createFromFormat('d/m/Y', $vencimento);
  $hoje = Carbon\Carbon::now();

  $diff = $vencimento->diffInDays($hoje);
  $taxa = ($empresa['multadiariaporc']) / 100;
  $valorTitulo = str_replace(',', '.', str_replace('.', '', $valordescontado));

  $valorAposVencimento = $valorTitulo * ($empresa['multaporc'] / 100);

  $potencia = pow(1 + $taxa, $diff);
  $valortotal = $valorAposVencimento + ($valorTitulo * $potencia);

?>


{{ round($valortotal,2) }}