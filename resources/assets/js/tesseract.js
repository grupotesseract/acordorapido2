//Quando ready...
$(function () {

    //span que contem o data-target 
    let contadorCaracteres = $('#contador-caracteres');
    
     //Se existir um contador de caracteres na tela, binda o contador ao seu target
    if ( contadorCaracteres.length ) {
        bindContadorCaracteres(contadorCaracteres);
    }
});

//Funcao que faz o bind do contador com o target
let bindContadorCaracteres = function(contador) {
    let idTarget =  contador.data('target');
    
    //Se existir o target do contador na mesma view
    if ( $('#'+idTarget).length ) {
         $('#'+idTarget).on('keydown', function(evento) {
    
             let caracteresSobrando = 160 - evento.target.textLength;
             contador.text(caracteresSobrando);

         });
    }

    //Chamando evento para atualizando quando no onload ja existir algum valor na textarea
    $('#'+idTarget).trigger("keydown");
};

let chamaSweetAlertErroDisparoEmail = function() {
    swal(
      'Oops...',
      'Something went wrong!',
      'error'
    );
};

$(document).on("click", ".enviarligacao", function () {
     var id = $(this).data('id');
     $("#aviso_id").val(id);
     
});

$(document).on("click", "#titulos", function () {
    let valor = parseFloat($(".valororiginal").val());
    let valorasersomado = parseFloat($('#titulos').val());
    var valorsomado = 0;

    if($('#titulos').prop("checked")) {
        valorsomado = valor + valorasersomado;
    }
    else {
        valorsomado = valor - valorasersomado;
    }


    console.log(valorsomado);
    $(".valororiginal").val(valorsomado);
});

$(document).ready(function(){ 

    $(".valororiginal").val(0);
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