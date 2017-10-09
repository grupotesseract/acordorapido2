@extends('welcome.master')

@section('content')

<div class="full-width" id="inicio">
    <div class="container">
        <div class="menu row">
            <div class="col-sm-3">
                <img src="/img/logoacordorapido.png" alt="Acordo Rápido">
            </div>
        </div>
        <h3>Monitoramento de crédito escolar</h3>
        <p>Algum texto aqui, pois o título apenas ficou esquisito.<br>Podemos falar brevemente sobre o Acordo Rapido, e a facilidade na hora da cobrança.<br>Se preferir ficar sem o texto mesmo, vamos pensar em outro lugar pra colocar o "Monitoramento de crédito escolar"</p>
    </div>
</div>

<div class="full-width" id="empresa">
    <div class="width100">
        <div class="width60-fixo responsivo">
            <img src="http://res.cloudinary.com/tesseract/image/upload/v1507566012/acordorapidoimagem.jpg">
        </div>
        <div class="width40-fixo borda-60 responsivo">
            <h5>O Acordo Rápido é uma forma inovadora e inteligente de recuperar créditos</h5>
            <p>
                Alinhado com a modernidade e a tecnologia, o Acordo Rápido elimina o estresse da relação de cobrança, oferecendo total privacidade ao cliente.
            </p>
        </div>
    </div>

</div>

<div class="modulos-box" id="modulos">
    <h4 class="titulo-centralizado"><span>FERRAMENTA MODULAR DE AÇÃO CONTÍNUA</span></h4>

    <div class="modulo-principal">
        <div>
            <img src="/img/bola-1.png">
            <h3>Monitoramento de Crédito Escolar</h3>            
        </div>
    </div>

    <div class="modulos">
        <div class="modulo">
            <img src="/img/bola-2.png">
            <h3>Prevenção</h3>
        </div>
        <div class="modulo">
            <img src="/img/bola-3.png">
            <h3>Recuperação</h3>
        </div>
        <div class="modulo">
            <img src="/img/bola-4.png">
            <h3>Intensiva</h3>
        </div>
        <div class="modulo">
            <img src="/img/bola-5.png">
            <h3>Cobrança</h3>
        </div>
    </div>
</div>

{{--
<div class="full-width" id="modulos">
    <div class="container">
        <h4 class="titulo-centralizado"><span>Ferramenta Modular de Ação Contínua</span></h4>

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
--}}