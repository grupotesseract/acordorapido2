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

<!-- JS Custom -->

<!-- <script>
    function checkAll() {
        var checkboxes = document.getElementsByTagName('input');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = !checkboxes[i].checked;
            }
        }         
    }
</script> -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/tesseract.js') }}"></script>


<script>
    var handleMasks = function (){
        $(function() {
            $(".escolherData").datepicker({
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior'

            });
            
            $('.valor').mask('000.000.000.000.000,00', {reverse: true});
            $('input[name=multadiariaporc]').mask('#.##0,00', {reverse: true});
            $('input[name=multaporc]').mask('000.000.000.000.000,00', {reverse: true});
            $('.escolherData').mask('00/00/0000');
            $('#valoracordado').mask('000.000.000.000.000,00', {reverse: true});

        });
    };

    
    $(document).on('focusin', '.valor', function(){
        $(this).data('val', $(this).val().replace(/\./g, "").replace(",", "."));
    });

    function criaMilhar(nStr) {
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }

    $(document).on('change', '.valor', function(){
        var prev = $(this).data('val');
        var atual = $(this).val().replace(/\./g, "").replace(",", ".");
        var diferenca = prev - atual;        

        var valorAntigoUltimaParcela = $('.valor').last().val().replace(/\./g, "").replace(",", ".");
        
        
        valorNovoUltimaParcela = (+valorAntigoUltimaParcela + +diferenca).toFixed(2);
        valorNovoUltimaParcela = valorNovoUltimaParcela.toString().replace(".", ",");  

        $('.valor').last().val(valorNovoUltimaParcela);

        $('.valor').trigger('input');
    });

    var calculaParcelas = function () {
        $(function() {        

            var valor = $("input[name=valoracordado]").val(),
                valor = valor.replace(/\./g, ""),
                valor = valor.replace(",", "."),
                num = $('.valor').length,
                cadaParcela = (+valor/+num).toFixed(2);            
            
            $('.valor').each(function(i, obj) {
                $(obj).val(cadaParcela.replace('.',','));  
                $(obj).trigger('input');
            });     



        });

    }

    $('#btnAdd').click(function() {
        $('#btnRemove').prop('disabled', false);

        var num = $('.clonedInput').length;
        var newNum = new Number(num + 1);

        var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);

        newElem.children('#box').children('#parcela' + num).attr('id', 'parcela' + newNum).attr('value',newNum);
        newElem.children('#box').children('#datetimepicker' + num).attr('id', 'datetimepicker' + newNum);
        newElem.children('#box').children('#datetimepicker' + newNum).children('#calendario' + num).attr('id', 'calendario' + newNum).attr('class', 'form-control escolherData');       
        

        $('#input' + num).after(newElem);
        $('#btnDel').attr('disabled', '');
        
        calculaParcelas();       
        handleMasks();        


    });

    $('#btnRemove').on('click', function() {
        $('.clonedInput').last().remove();
        var num = $('.clonedInput').length;
        if (num == 1) $('#btnRemove').attr('disabled', 'disabled');
        calculaParcelas();       
        handleMasks();       

    }); 
    

    $('input[name=valoracordado]').on('keyup', function() {        
        calculaParcelas();       
    });

    $(document).on('mask-it', function() {
        handleMasks();
    }).trigger('mask-it');

    $(document).ready(function() {
        $(this).trigger('mask-it');
        calculaParcelas();       
    });

</script>


@yield('scripts')
</body>
</html>
