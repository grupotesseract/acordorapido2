<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Acordo Rápido</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="icon" 
      type="image/png" 
      href="img/favicon.png">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Merriweather:700" rel="stylesheet"> 

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.scrollto/2.1.2/jquery.scrollTo.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Styles -->
        <style>
            nav {
                position: fixed;
                right: 0px;
                top: 20%;
            }
            nav ul {
                list-style: none;
                text-align: right;
            }
            nav a {
                color:#7cd000;
                padding-right: 4em;
                font-size: 1.45em!important;
                text-transform: uppercase;
                transition: opacity 0.2s;
                padding-top: 5px!important;
                padding-bottom: 5px!important;
            }
            nav a:hover,
            nav a:active,
            nav a:focus {
                text-decoration: none!important;
                background-color: transparent!important;
                color:#7cd000!important;
                opacity: .6!important;
                border-radius: 20px!important;
            }
            nav a:hover:after,
            nav a:active:after,
            nav a:focus:after {
                background-color: #7cd000!important;
                border-radius: 20px!important;
            }
            html, body {
                background-color: #fff;
                font-family: 'Open Sans', sans-serif;
                margin: 0;
            }
            h1, h2, h3, h4, h5 { font-family: 'Merriweather', serif; }

            .full-width {
                width: 100%;
            }
            .font-right {
                text-align: right;
            }
            
            .links {
                margin-top: 1em;
            }
            .links a {
                text-decoration: none;
            }
            .links a:hover {
                color:#7cd000;
            }
            .verde,
            a.verde,
            .verde a {
                color:#7cd000;
                text-decoration: none; 
            }

            .titulo-centralizado {
                text-align:center;
                font-size: 2em;
                text-transform: uppercase;
                padding: 2em 0 2em;
            }
        
            .titulo-centralizado span {
                position: relative;
            }
            .titulo-centralizado span:after {
                content: ' ';
                position: absolute;
                width:94%;
                top: 100%;
                left:3%;
                border-top: 6px solid #005daa;
            }

            .modulos {
                color: white;
                text-align:center;
                margin-bottom: 5rem;
            }
            .modulos h5 {
                padding-top:1em;
                font-size: 1.5em;
            }
            .modulo { height: 15em; }
            .modulo p {
                padding: 1em 0.8em 2em;
            }
            .modulo-azul {
                background-color: #005daa;
            }
            .modulo-verde {
                background-color: #7cd000;
            }
            .modulo-amarelo {
                background-color: #ff8800;
            }
            .modulo-vermelho {
                background-color: #ff0020;
            }
            .menu {
                padding-top: 6em;
            }
            .menu a {
                color: white;
                text-transform: uppercase;
                font-size: 1.4em;
                font-weight: bold;
                margin: 0em 1em 0;
                padding-top: 1em;
            }
            .width100 {
                display: inline-block;
                width:100%;
                line-height: 1.8em;
            }
            .width60-fixo {
                width: 60%;
                float:left;
            }
            .width60-fixo img {
                width:100%;
                margin: 10% 0 10%;
            }
            .width40-fixo {
                float:left;
                width: 40%;
                padding: 2.5em 4em 6em 3.5em;
            }
            .width40-fixo h5 {
                font-size: 2em;
                padding-top:2.5em;
            }
            .width40-fixo p {
                padding-top:1em;
                font-size: 0.95em;
                line-height: 1.7em;
            }
            .borda-60 {
                margin-top:12.5%;
                position:relative;
            }
            .borda-60:after {
                content:' ';
                position:absolute;
                right: 0;
                top:0;
                width:128%;
                height:100%;
                border: 0.8em solid #005ea8;
            }
            #barra-superior {
                background-color: rgba(0,0,0,0.5);
                position: fixed;
                top:0px;
                width:100%;
                padding-top: 0.5em;
                padding-bottom: 0.5em;
            }
            #barra-superior .navbar-toggle .icon-bar {
                background-color: rgba(124, 208, 0, 0.6);
            }
            #barra-superior li ~ li {
                border-left: 2px solid rgba(124, 208, 0, 0.6);
                padding-left: 1em;
                margin-left: 1em;
            }
            
            #inicio {
                height: 90vh;
                min-height: 50em;
                color: white;
                background-image: url('http://res.cloudinary.com/tesseract/image/upload/c_scale,q_80,w_1920/v1506449792/acordo_rapido_home_inicio.jpg');
                background-size: cover;
                background-position: center center;
            }
            #inicio h3 {
                margin-top: 5em;
                font-size: 3em;
            }
            #inicio p {
                font-size: 1.4em;
                margin-top:1.7em;
            }

            #empresa {
                padding-bottom: 2em;
            }

            #modulos {
                background-color: rgb(179, 213, 243);
                background-size: cover;
                background-position: center center;
                background-blend-mode: screen;
            }
            #modulos .container {
             max-width: 70em;
            }
            
            #contato {
                background-color: #d1e6ad;
                padding-bottom: 5em;
            }
            .margint3 {
                margin-top: 3em;
            }
            #contato .dados {
                font-size:1.2em;
                color: #005daa;
                text-align: center;
            }
            #contato .col-sm-6 {
                padding: 0 5em 0;
            }
            #contato h5 {
                color: black;
                text-align: center;
                font-size: 1.3em;
            }
            #contato form {
                margin-top: 2em;
            }
            #contato form input,
            #contato form textarea {
                width: 100%;
                border: 0px solid transparent;
                background-color: white;
                margin-top: 0.5em;
                color:black;
                padding: 0.3em 0.5em 0.5em;
            }
            #contato form input[type="submit"] {
                width:auto;
                float:right;
                background-color: #005daa;
                color:white;
                padding: 0.3em 1em 0.4em;
            }

            .vertical-helper {
                height: 100%;
                display: inline-block;
                vertical-align: middle;
            }
            
            .center-vertical {
                display: inline-block;
                vertical-align: middle;
            }

            .link-icon {
                height:32px;
            }

            .container-fases {
                padding: 1.5em;
                margin: 1em 0
            }

            .container-fases > h5 {
                color: #333;
                margin-bottom: 1em;
                font-size: 1.8em;
            }

            .container-fases:after {
                content:' ';
                position:absolute;
                right: 0;
                top:0;
                width:100%;
                height:100%;
                border: 0.8em solid #005ea8;
            }

            #itenslista > li {
                display: inline-block;
                /* You can also add some margins here to make it look prettier */
                zoom:1;
                *display:inline;
                /* this fix is needed for IE7- */
                padding:10px 1%;
                width: 30%;
            }



        @media (max-width:768px) {
            .width100 {
                width:100%;
                line-height: 1.8em;
            }
            .width60-fixo.responsivo {
                width: 100%;
            }
            .width60-fixo img {
                width:100%;
                margin: 10% 0 10%;
            }
            .width40-fixo.responsivo {
                width: 100%;
                float: none;
                text-align: center;
                margin: 0;
                padding: 1em;
            }
            .width40-fixo h5 {
                font-size: 2em;
                padding-top:2.5em;
            }
            .width40-fixo p {
                padding-top:1em;
                font-size: 0.95em;
                line-height: 1.7em;
            }
            .borda-60 {
                margin-top:12.5%;
                position:relative;
            }
            .borda-60:after {
                content:' ';
                position:absolute;
                right: 0;
                top:0;
                width:100%;
                height:100%;
                border: 0.8em solid #005ea8;
            }

            .container-fases {
                padding: 1em;
                margin: 1em 0;
            }

            .container-fases > h5 {
                color: #333;
                margin-bottom: 1em;
            }

            .container-fases:after {
                content:' ';
                position:absolute;
                right: 0;
                top:0;
                width:100%;
                height:100%;
                border: 0.8em solid #005ea8;
            }

            #barra-superior li ~ li {
                border-left: 0px solid rgba(124, 208, 0, 0.6);
            }

            #inicio h3 {
                margin-top: 3.5em;
                font-size: 2.5em;
            }


        }

        </style>
        <script>
            $(document).ready(function() {
              // Bind to the click of all links with a #hash in the href
              $('a[href^="#"]').click(function(e) {
                e.preventDefault();
                $(window).stop(true).scrollTo(this.hash, {duration:1000, interrupt:true});
              });
            });
        </script>
    </head>
    <body> 
    
        <div class="full-width" id="inicio">
            <div class="container">
                <div class="menu row">
                    <div class="col-sm-3">
                        <img src="/img/logoacordorapido.png" alt="Acordo Rápido">
                    </div>
                </div>
                <h3>
                    Monitoramento de crédito escolar de forma inteligente
                </h3>
            </div>
        </div>

        <div class="full-width" id="empresa">
            <div class="width100">
                <div class="width60-fixo responsivo">
                    <img src="http://res.cloudinary.com/tesseract/image/upload/c_scale,q_80,w_1920/v1506449790/acordo_rapido_home_empresa.jpg">
                </div>
                <div class="width40-fixo borda-60 responsivo">
                    <h5> O Acordo Rápido é uma forma inovadora e inteligente de recuperar créditos </h5>
                    <p>
                        Alinhado com a modernidade e a tecnologia, o Acordo Rápido elimina o estresse da relação de cobrança, oferecendo total privacidade ao cliente.
                    </p>
                </div>
            </div>

        </div>

        <div class="full-width" id="modulos">
            <div class="container">
                <h4 class="titulo-centralizado"><span>Ferramenta de Ação Contínua</span></h4>

                <!-- <ul id="itenslista">
                    <li>PREVINE ATRASOS</li>
                    <li>DIMINUI A IMPONTUALIDADE</li>
                    <li>RECUPERA MENSALIDADES ATRASADAS</li>
                </ul> -->                

                <div class="row modulos">
                    
                    <div class="col-xs-12 col-md-5 container-fases">
                        <h5>FASE I</h5>

                        <div class="modulo col-sm-6 modulo-azul">
                            <h5>Prevenção</h5>
                            <ul>
                                <li class="pull-left">Todos os clientes</li>
                                <li class="pull-left">Pontualidade</li>
                            </ul>                            
                        </div>
                        <div class="modulo col-sm-6 modulo-verde">
                            <h5>Recuperação</h5>
                            <ul>
                                <li class="pull-left">Atrasos</li>
                                <li class="pull-left">Impontualidade</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xs-hidden col-md-2"></div>
                    
                    <div class="col-xs-12 col-md-5 container-fases">
                        <h5>FASE II</h5>

                        <div class="modulo col-sm-6 modulo-amarelo">
                            <h5>Intensiva</h5>
                            
                            <ul>
                                <li class="pull-left">Inadimplentes</li>
                                <li class="pull-left">Recuperação</li>
                            </ul>
                        </div>
                        <div class="modulo col-sm-6 modulo-vermelho">
                            <h5>Cobrança</h5>
                            <ul>
                                <li class="pull-left">Inadimplência</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="full-width" id="contato">
            <div class="container">
                <h4 class="titulo-centralizado"><span>Contato</span></h4>
                <div class="row dados">
                    <div class="col-sm-6 col-md-offset-3">
                        Preencha o formulário abaixo e um dos nossos consultores estará em contato

                        {!! Form::open(array('url'=>'contatos/','method'=>'POST','name'=>'contatoform', 'id'=>'form-contato')) !!}
                            <input type="text" name="nome" placeholder="Nome">
                            <input type="email" name="email" placeholder="Email">
                            <input type="text" name="escola" placeholder="Escola">
                            <textarea placeholder="Mensagem" name="mensagem"></textarea>
                            <input type="submit" value="Enviar">
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <nav class="navbar verde" id="barra-superior">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                  </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav navbar-left">
                    @if (Auth::check())
                        <li><a href="{{ url('/home') }}">Admin</a></li>
                    @else
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @endif
                    <li><a class="link-icon" href="tel:+55 14 991 765 678">
                        <span class="vertical-helper"></span>
                        <span class="glyphicon glyphicon-earphone vertical-helper" aria-hidden="true"></span>
                        <span class="center-vertical">(14) 991 765 678</span>
                    </a> </li>      
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#inicio">Início</a></li>
                    <li><a href="#empresa">A Empresa</a></li>
                    <li><a href="#modulos">Como Funciona</a></li>
                    <li><a href="#contato">Contato</a></li>
                  </ul>
                </div>
              </div>
            </nav>
        </div>

<script>
$(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#form-contato').submit(function (ev) {
        ev.preventDefault();

        $.ajax({
            url: 'contatos',
            type: 'POST',
            dataType: 'json',
            data: $('#form-contato').serialize() ,
            complete: function (jqXHR, textStatus) {
                // callback
            },
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                console.log(textStatus);
                console.log(jqXHR);
                if (data.success) {
                    swal ( "Obrigado" ,  "Seu contato foi enviado com sucesso, entraremos em contato!" ,  "success" )
                }

                else {
                    swal ( "Oops" ,  "Ocorreu um erro na requisição, tente novamente!" ,  "error" )
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                    swal ( "Oops" ,  "Ocorreu um erro na requisição, tente novamente!" ,  "error" )
            }
        });
    });
});
</script>

    </body>
</html>
