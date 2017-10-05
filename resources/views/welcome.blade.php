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
        <link rel="icon" type="image/png" href="img/favicon.png">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Merriweather:700" rel="stylesheet">

        <!-- CSS/SASS -->
        <link href="/css/app.css" rel="stylesheet">

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.scrollto/2.1.2/jquery.scrollTo.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
