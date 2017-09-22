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

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Merriweather:700" rel="stylesheet"> 

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
            nav ul {
                list-style: none;
                text-align: right;
            }
            nav a {
                color:#7cd000;
                opacity: 0.5;
                padding-right: 4em;
                font-size: 1.8em;
                text-transform: uppercase;
                transition: opacity 0.2s;
            }
            nav a:after {
                content: ' ';
                position: absolute;
                margin-top: 0.3em;
                margin-left: 1em;
                width: 0.8em;
                height: 0.8em;
                border-radius: 2em;
                border: 1px solid #7cd000;
            }
            nav a:hover,
            nav a:active,
            nav a:focus {
                text-decoration: none;
                color:#7cd000;
                opacity: 1;
            }
            nav a:hover:after,
            nav a:active:after,
            nav a:focus:after {

                background-color: #7cd000;
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
            .modulo { height: 18em; }
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
                left:0;
                font-size: 1.5em;
                padding-top: 0.5em;
                padding-bottom: 0.5em;
            }
            #barra-superior a ~ a {
                border-left: 2px solid #7cd000;
                padding-left: 1em;
                margin-left: 1em;
            }
            
            #inicio {
                height: 90vh;
                color: white;
                background-image: url('/img/inicio.jpg');
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
                background-color: rgb(100,170,230);
                background-image: url('/img/modulosbg.jpg');
                background-size: cover;
                background-position: center center;
                background-blend-mode: screen;
                padding-bottom: 2em;
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
                <li><a href="#empresa">Empresa</a></li>
                <li><a href="#modulos">Módulos</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
    
        <div class="full-width" id="inicio">
            <div class="container">
                <div class="menu row">
                    <div class="col-sm-3">
                        <img src="/img/logoacordorapido.png" alt="Acordo Rápido">
                    </div>
                    <div class="col-sm-9 links font-right">
                        <a href="#inicio">Início</a>
                        <a href="#empresa">A Empresa</a>
                        <a href="#modulos">Módulos</a>
                        <a href="#contato">Contato</a>
                    </div>
                </div>
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
                <div class="width100">
                    <div class="width60-fixo">
                        <img src="/img/empresa.jpg">
                    </div>
                    <div class="width40-fixo borda-60">
                        <h5> O Acordo Rápido é uma forma inovadora e inteligente de recuperar créditos </h5>
                        <p>
                            Alinhado com a modernidade e a tecnologia, o Acordo Rápido elimina o estresse da relação de cobrança, oferecendo total privacidade ao usuário. Você pode regularizar seus débitos com a instituição de ensino estando em qualquer lugar, através da internet, até mesmo no conforto da sua casa
                        </p>
                    </div>
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
                        <p>Incentivo para que os clientes paguem suas mensalidades atrasadas</p>
                    </div>
                    <div class="modulo col-sm-3 modulo-vermelho">
                        <h5>Cobrança</h5>
                        <p>Cobramos os clientes inadimplentes recuperando o seu crédito</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="full-width" id="contato">
            <div class="container">
                <h4 class="titulo-centralizado"><span>Contato</span></h4>
                <div class="row dados">
                    <div class="col-sm-6">
                    <h5>Endereço:</h5>
                    R. Senhorinha Felícia Aparecida, Nucleo Hab. Pres. Geisel, Bauru - SP
    
                    <h5 class="margint3">Telefone:</h5>
                    <a href="tel:+55 14 991 765 678">
                       (14) 99176-5678
                    </a>
                    </div>
                    <div class="col-sm-6">
                        <h5>Fale conosco:</h5>
                        Preencha o formulário abaixo e um dos nossos consultores estará em contato
                        <form>
                            <input type="text" name="nome" placeholder="Nome">
                            <input type="email" name="email" placeholder="Email">
                            <input type="text" name="assunto" placeholder="Assunto">
                            <textarea placeholder="Mensagem"></textarea>
                            <input type="submit" value="Enviar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

    </body>
</html>
