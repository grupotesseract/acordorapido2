@foreach ($avisos as $aviso)
    @foreach ($aviso['avisosenviados'] as $avisoenviado)

        <?php 
          switch ($aviso['estado']) {
            case 'azul':
              $bootStrapClass = 'primary';
              break;
            case 'verde':
              $bootStrapClass = 'success';
              break;
            case 'amarelo':
              $bootStrapClass = 'warning';
              break;
            case 'vermelho':
              $bootStrapClass = 'danger';
              break;
          }

          switch ($avisoenviado['tipodeaviso']) {
            case 0:
              $iconClass = 'glyphicon glyphicon-envelope';
              break;
            case 1:
              $iconClass = 'glyphicon glyphicon-earphone';
              break;
          }    
        ?>

        <span class="label label-{{ $bootStrapClass }}"><span class="{{ $iconClass }}" aria-hidden="true"></span></span>

    @endforeach


@endforeach