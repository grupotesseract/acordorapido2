<div class="full-width" id="contato">
    <div class="container">
        
    <div class="col-sm-6">
        <h4 class="titulo-centralizado"><span>Ficou interessado?</span></h4>
        Preencha o formulário ao lado e um dos nossos consultores estará em contato        
    </div>

    <div class="col-sm-6">
        <div class="row dados">               

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

<!-- Javascript -->

<!-- Prefixfree -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js" integrity="sha256-GaKOLXTn7uJXFuWp57ukQZGuKK2gWZWlEH16hc6jBU8=" crossorigin="anonymous"></script>

<!-- Jquery -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.scrollto/2.1.2/jquery.scrollTo.min.js"></script>

<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Custom Javascript -->
<script type="text/javascript" src="/js/welcome.js"></script>