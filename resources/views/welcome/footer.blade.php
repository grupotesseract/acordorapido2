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

<!-- Javascript -->
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
