<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ACORDO RÁPIDO - Painel Administrativo</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="/css/sweetalert2.css">
    <link rel="icon" type="image/png" href="img/favicon.png">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
    @yield('css')
</head>

<body class="skin-purple sidebar-mini">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment-with-locales.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui//1.12.1/themes/base/jquery-ui.css" />
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{url('home')}}" class="logo">
            <b>Acordo Rápido</b>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Navegar</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                 class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg"
                                     class="img-circle" alt="User Image"/>
                                <p>
                                    {!! Auth::user()->name !!}
                                    <small>Membro desde  {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">{{ trans('message.profile') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ trans('message.signout') }}
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Main Footer -->
    <footer class="main-footer" style="max-height: 100px;text-align: center">
        <strong>Desenvolvido por <a href="http://grupotesseract.com.br" target="_blank">Grupo Tesseract</a></strong> 
    </footer>

</div>


<!-- jQuery 3.1.1 -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>

<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>


<!-- JS Custom -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/tesseract.js') }}"></script>


<script>
    window.selecionarTitulo = function(ev,valor,id) {

        let linha = $(ev.target).parents('tr');
        let containerSelecionados = $('.titulosSelecionados');
        let htmlBtnRemover = "<i class='fa fa-close'></i>";
        let htmlInputHidden = '<input type="hidden" id=titulo'+id+' name="titulos[]" value='+id+' />'; 

        linha.find('a.btn.btn-info')
            .attr('onclick', 'removerLinha(event,'+valor+','+id+')')
            .removeClass('btn-info')
            .addClass('btn-danger')
            .html(htmlBtnRemover)
            .next().removeAttr('disabled');

        containerSelecionados.append(htmlInputHidden);

        var valorAntigo = $("input[name=valororiginal]").val(),
            valorAntigo = valorAntigo.replace(/\./g, ""),
            valorAntigo = valorAntigo.replace(",", ".");

        
        valorNovo = parseFloat(valorAntigo) + parseFloat(valor);
        valorNovo = valorNovo.toFixed(2);

        $("#valororiginal").val(valorNovo.replace(".",","));
        $("#valoracordado").val(valorNovo.replace(".",","));
        $('#valoracordado').mask('000.000.000.000.000,00', { reverse: true });


        calculaParcelas();
        handleMasks();
    };

    window.removerLinha = function(ev,valor,id) {
       
        $('.titulosSelecionados').find('#titulo'+id).remove();
        let htmlBtnAdicionar = "<i class='fa fa-plus'></i>";

        let linha = $(ev.target).parents('tr');

        linha.find('a.btn.btn-danger')
            .attr('onclick', 'selecionarTitulo(event,'+valor+','+id+')')
            .removeClass('btn-danger')
            .addClass('btn-info')
            .html(htmlBtnAdicionar)
            .next().removeAttr('disabled');

        var valorAntigo = $("input[name=valororiginal]").val(),
            valorAntigo = valorAntigo.replace(/\./g, ""),
            valorAntigo = valorAntigo.replace(",", ".");          

        valorNovo = parseFloat(valorAntigo) - parseFloat(valor);
        valorNovo = valorNovo.toFixed(2);
        
        $("#valororiginal").val(valorNovo.replace(".",","));
        $("#valoracordado").val(valorNovo.replace(".",","));   
        $('#valoracordado').mask('000.000.000.000.000,00', { reverse: true });

        
        calculaParcelas();
        handleMasks();

    }

    $('#botaoParcelas').click(function () {
        
        let qtde = $("#numeroInicial").val();
        var num = $('.clonedInput').length;        

        for (i = num; i > 1; i--) {            
            removeParcela();
        }       

        let data_inicio = $("#dataInicial").val();
        
        let splitted = data_inicio.split('/');
        var dt = new Date(splitted[2],parseInt(splitted[1])-1,parseInt(splitted[0])+1);
         

        for (i = 1; i < qtde; i++) {           
            adicionaParcela();
            /*dt.setDate(dt.getDate()+30);
            var finalDate = dt.getDate() + "/" + (dt.getMonth()+1) + "/" + dt.getYear();
            console.log(finalDate);
            $("#calendario"+i).val(finalDate);*/
            
        }
    });

    $( "#finalizaLigacao" ).click(function(){
        $('.botaoSalvar').prop('disabled', false);
    });

    $( "#addLigacao" ).click(function(){
        $('.finalizaLigacao').prop('disabled', false);
    });


</script>

@yield('scripts')
</body>
</html>
