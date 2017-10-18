// Page Scrool
$(document).ready(function() {
  // Bind to the click of all links with a #hash in the href
  $('a[href^="#"]').click(function(e) {
    e.preventDefault();
    $(window).stop(true).scrollTo(this.hash, {duration:1000, interrupt:true});
  });
});

// Forms
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