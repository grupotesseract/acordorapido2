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

<body class="skin-blue sidebar-mini">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
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
                <span class="sr-only">Toggle navigation</span>
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

<!-- JS Custom -->
<script src="{{ asset('js/app.js') }}"></script>

<script>
    function checkAll() {
        var checkboxes = document.getElementsByTagName('input');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = !checkboxes[i].checked;
            }
        }         
    }
</script>


<script>   

    $(document).on("click", ".enviarligacao", function () {
         var id = $(this).data('id');
         $("#aviso_id").val(id);
         
    });         

</script>

<style>        

    .display{
      font-size: 60px;
      padding: 0 !important;
    }
    .display>span{
      font-weight: bold;
    }       
    .well{
      border-radius: 0 !important;
      font-size: 13px !important;
      padding: 0 !important;
    }
    .well_laps{
      padding: 10px !important;
    }

</style>

<script>
    $(document).ready(function(){ 

        var vueltas = 0;
        var cron;
        var sv_min = 0;
        var sv_hor = 0;
        var sv_seg = 0;
        var seg = document.getElementById('seg');
        var min = document.getElementById('min');
        var hor = document.getElementById('hor');
        var iniciado = false; //init status of cron

        $("#btn_play").click(function(){
            if(!iniciado){ iniciado = true; start_cron(); }
        });

        function start_cron(){
          cron = setInterval(function(){
            sv_seg++;
            if(sv_seg < 60){
              if(sv_seg < 10){ seg.innerHTML = "0"+sv_seg; }else{ seg.innerHTML = sv_seg; }
            }else{
              sv_seg = 0; seg.innerHTML = "00";
              sv_min++;
              if(sv_min < 60){
                if(sv_min < 10){ min.innerHTML = "0"+sv_min; }else{ min.innerHTML = sv_min; }
              }else{
                sv_min = 0; min.innerHTML = "00";
                sv_hor++;
                if(sv_hor < 10){ hor.innerHTML = "0"+sv_hor; }else{ hor.innerHTML = sv_hor; }
              }
            }
          }, 1000);
        }

        $("#btn_pause").click(function(){
          clearInterval(cron);
          iniciado = false;
        });

        $("#btn_stop").click(function(){
          sv_min = 0;
          sv_hor = 0;
          sv_seg = 0;
          seg.innerHTML = "00";
          min.innerHTML = "00";
          hor.innerHTML = "00";
          clearInterval(cron);
          iniciado = false;
        });

        $("#btn_lap").click(function(){
          vueltas++;
          consola('<li class="list-group-item"><small>'+vueltas+'</small>     '+hor.innerHTML+":"+min.innerHTML+":"+seg.innerHTML+'</li><input type="hidden" name="tempoligacao[]" value="'+hor.innerHTML+":"+min.innerHTML+":"+seg.innerHTML+'" />');
        });

        function consola(msg){
          $("#log").prepend(msg);
        }

        $("#btn_clear").click(function(){
          $("#log").html("");
          vueltas = 0;
        });


    });
</script>


@yield('scripts')
</body>
</html>
