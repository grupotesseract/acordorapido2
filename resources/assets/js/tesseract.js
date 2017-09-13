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



