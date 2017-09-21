<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Acordo Rápido</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.scrollto/2.1.2/jquery.scrollTo.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
            nav {
                position: fixed;
                right: 0px;
                top: 20%;
            }
            html, body {
                background-color: #fff;
                margin: 0;
            }

            .full-width {
                width: 100%;
            }

            .font-right {
                text-align: right;
            }
            
            .verde,
            a.verde,
            .verde a {
                color:green;
                text-decoration: none; 
            }

            .titulo-centralizado {
                text-align:center;
                font-size: 2em;
                text-transform: uppercase;
            }
        
            .titulo-centralizado span {
                position: relative;
            }
            .titulo-centralizado span:after {
                content: ' ';
                position: absolute;
                width:90%;
                top: 100%;
                left:5%;
                border-top: 6px solid blue;
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
            
            .modulo p {
                padding: 1em 0.8em 2em;
            }
            .modulo-azul {
                background-color: blue;
            }
            .modulo-verde {
                background-color: green;
            }
            .modulo-amarelo {
                background-color: yellow;
            }
            .modulo-vermelho {
                background-color: red;
            }

            #barra-superior {
                background-color: rgba(0,0,0,0.5);
                position: fixed;
                top:0px;
                width:100%;
                left:0;
            }
            #barra-superior a ~ a {
                border-left: 2px solid green;
                padding-left: 1em;
                margin-left: 1em;
            }
            
            #inicio {
                background-color: blue;
                height: 90vh;
                color: white;
            }
            #inicio h3 {
                margin-top: 6em;
                font-size: 3em;
            }
            #inicio p {
                font-size: 1.4em;
                margin-top:1em;
            }

            #empresa {
            }

            #modulos {
                background-color: lightblue;
            }
            #modulos .container {
             max-width: 60em;
            }
            
            #contato {
                background-color: lightgreen;
            }
        </style>
        <script>
$(document).ready(function(){

$(document).ready(function() {
  // Bind to the click of all links with a #hash in the href
  $('a[href^="#"]').click(function(e) {
    e.preventDefault();
    $(window).stop(true).scrollTo(this.hash, {duration:1000, interrupt:true});
  });
});
});
        </script>
    </head>
    <body> 

        <nav>
            <ul>
                <li><a href="#inicio">Início</a></li>
                <li><a href="#empresa">A Empresa</a></li>
                <li><a href="#modulos">Módulos</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
        <div class="full-width verde" id="barra-superior">
            <div class="container font-right">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                @endif
                <a href="tel:+55 14 991 765 678">
                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                    (14) 991 765 678
                </a>
            </div>
        </div>

        <div class="full-width" id="inicio">
            <div class="container">
                <h3>
                    Monitoramento de crédito<br>
                    escolar. Sem stress, sem complicações, <br>
                    sem surpresas.
                </h3>
                <p>
                    Não é fácil conciliar estudos, casa, trabalho e finanças. O Acordo Rápido <br>
                    chegou pra te ajudar! Deixe suas mensalidades em dia, sem sair de <br>
                    casa. Tudo de uma maneira bem simples e rápida! Veja todos os <br>
                    benefícios e venha você também colocar em dia seus débitos! <br>
                </p>
            </div>
        </div>

        <div class="full-width" id="empresa">
            <div class="container">
                <div class="col-sm-7">
                </div>
                <div class="col-sm-5">
                    <h5> O Acordo Rápido é uma forma inovadora e inteligente de recuperar créditos </h5>
                </div>
            </div>
        </div>

        <div class="full-width" id="modulos">
            <div class="container">
                <h4 class="titulo-centralizado"><span>Módulos</span></h4>
                <div class="row modulos">
                    <div class="modulo col-sm-3 modulo-azul">
                        <h5>Prevenção</h5>
                        <p>Enviamos SMS para os clientes sobre a data de pagamento</p>
                    </div>
                    <div class="modulo col-sm-3 modulo-verde">
                        <h5>Recuperação</h5>
                        <p>Lembrete para os que atrasaram a data estipulada</p>
                    </div>
                    <div class="modulo col-sm-3 modulo-amarelo">
                        <h5>Intensiva</h5>
                        <p>Enviamos SMS para os clientes sobre a data de pagamento</p>
                    </div>
                    <div class="modulo col-sm-3 modulo-vermelho">
                        <h5>Cobrança</h5>
                        <p>Enviamos SMS para os clientes sobre a data de pagamento</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="full-width" id="contato">
            <div class="container">
                <h4 class="titulo-centralizado"><span>Contato</span></h4>
                <div class="row">
                    <div class="col-sm-6">
                    Endereço:
                    Rua Senhorinha Felicia Aparecida, Pres. Geisel, Bauru - SP
    
                    Telefone:
                    <a href="tel:+55 14 991 765 678">
                       (14) 991 765 678
                    </a>
                    </div>
                    <div class="col-sm-6">
                    Fale conosco:
                    Lorem ispum theo vai as compras que irão encher seu coração de amor e de ilusão
                    <form>
                        <input type="text" name="nome" placeholder="Nome">
                        <input type="text" name="nome" placeholder="Nome">
                        <textarea placholder="Mensagem"></textarea>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
