/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(3);

/***/ }),
/* 1 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 2 */,
/* 3 */
/***/ (function(module, exports) {

window.handleMasks = function handleMasks() {
    $(function () {
        $(".escolherData").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
            dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior',
            orientation: "top"

        });

        $('.valor').mask('000.000.000.000.000,00', { reverse: true });
        $('input[name=multadiariaporc]').mask('#.##0,000', { reverse: true });
        $('input[name=multaporc]').mask('000.000.000.000.000,00', { reverse: true });
        $('.escolherData').mask('00/00/0000');
        $('#valoracordado').mask('#.##0,00', { reverse: true });

        $('#valororiginal').mask('#.##0,00', { reverse: true });
    });
};

$(document).on('focusin', '.valor', function () {
    $(this).data('val', $(this).val().replace(/\./g, "").replace(",", "."));
});

$(document).on('change', '.radioAcordo', function () {
    var boolean_required = $(this).val() === 'Acordo Feito';
    $('.valor').each(function (i, obj) {
        $(obj).attr('required', boolean_required);
    });

    $('.dataParcela').each(function (i, obj) {
        $(obj).attr('required', boolean_required);
    });

    $('#dataRetorno').attr('required', false);
    $('#dataInicial').attr('required', boolean_required);
});

$(document).on('change', '.valor', function () {
    var prev = $(this).data('val');
    var atual = $(this).val().replace(/\./g, "").replace(",", ".");
    var diferenca = prev - atual;

    var totalParcelas = $('.valor').length;
    var index = $('.valor').index($(this));

    var parcelasAfetadas = totalParcelas - (index + 1);
    var valorParcelas = diferenca / parcelasAfetadas;

    $('.valor').each(function (i, obj) {
        if (i > index) {
            var valorAntigoParcela = $(obj).val().replace(/\./g, "").replace(",", ".");
            var valorNovoParcela = (+valorAntigoParcela + valorParcelas).toFixed(2);
            var valorNovoParcela = valorNovoParcela.toString().replace(".", ",");
            $(obj).val(valorNovoParcela);
        }
    });

    $('.valor').trigger('input');
});

window.calculaParcelas = function calculaParcelas() {
    $(function () {

        var valor = $("input[name=valoracordado]").val(),
            valor = valor.replace(/\./g, ""),
            valor = valor.replace(",", "."),
            num = $('.valor').length,
            cadaParcela = (+valor / +num).toFixed(2);

        $('.valor').each(function (i, obj) {
            $(obj).val(cadaParcela.replace('.', ','));
            $(obj).trigger('input');
        });
    });
};

$('#btnAdd').click(function () {
    adicionaParcela();
});

window.adicionaParcela = function () {
    $('#btnRemove').prop('disabled', false);

    var num = $('.clonedInput').length;
    var newNum = new Number(num + 1);

    var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);

    newElem.children('#box').children('#parcela' + num).attr('id', 'parcela' + newNum).attr('value', newNum);
    newElem.children('#box').children('#datetimepicker' + num).attr('id', 'datetimepicker' + newNum);
    newElem.children('#box').children('#datetimepicker' + newNum).children('#calendario' + num).attr('id', 'calendario' + newNum).attr('class', 'form-control escolherData');

    $('#input' + num).after(newElem);
    $('#btnDel').attr('disabled', '');

    calculaParcelas();
    handleMasks();
};

window.removeParcela = function () {
    $('.clonedInput').last().remove();
    var num = $('.clonedInput').length;
    if (num == 1) $('#btnRemove').attr('disabled', 'disabled');
    calculaParcelas();
    handleMasks();
};

$('#btnRemove').on('click', function () {
    removeParcela();
});

$('input[name=valoracordado]').on('keyup', function () {
    calculaParcelas();
});

$(document).on('mask-it', function () {
    handleMasks();
}).trigger('mask-it');

$(document).ready(function () {
    $(this).trigger('mask-it');
    calculaParcelas();
});

//Quando ready...
$(function () {

    //span que contem o data-target 
    var contadorCaracteres = $('#contador-caracteres');

    //Se existir um contador de caracteres na tela, binda o contador ao seu target
    if (contadorCaracteres.length) {
        bindContadorCaracteres(contadorCaracteres);
    }
});

//Funcao que faz o bind do contador com o target
var bindContadorCaracteres = function bindContadorCaracteres(contador) {
    var idTarget = contador.data('target');

    //Se existir o target do contador na mesma view
    if ($('#' + idTarget).length) {
        $('#' + idTarget).on('keydown', function (evento) {

            var caracteresSobrando = 160 - evento.target.textLength;
            contador.text(caracteresSobrando);
        });
    }

    //Chamando evento para atualizando quando no onload ja existir algum valor na textarea
    $('#' + idTarget).trigger("keydown");
};

var chamaSweetAlertErroDisparoEmail = function chamaSweetAlertErroDisparoEmail() {
    swal('Oops...', 'Houve um erro!', 'error');
};

$(document).on("click", ".enviarligacao", function () {
    var id = $(this).data('id');
    $("#aviso_id").val(id);
});

$(document).ready(function () {

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

    $("#btn_play").click(function () {
        if (!iniciado) {
            iniciado = true;start_cron();
        }
        $('#ligacao').modal('toggle');
        $('.restanteInfos').css('display', 'block');
    });

    function start_cron() {
        cron = setInterval(function () {
            sv_seg++;
            if (sv_seg < 60) {
                if (sv_seg < 10) {
                    seg.innerHTML = "0" + sv_seg;
                } else {
                    seg.innerHTML = sv_seg;
                }
            } else {
                sv_seg = 0;seg.innerHTML = "00";
                sv_min++;
                if (sv_min < 60) {
                    if (sv_min < 10) {
                        min.innerHTML = "0" + sv_min;
                    } else {
                        min.innerHTML = sv_min;
                    }
                } else {
                    sv_min = 0;min.innerHTML = "00";
                    sv_hor++;
                    if (sv_hor < 10) {
                        hor.innerHTML = "0" + sv_hor;
                    } else {
                        hor.innerHTML = sv_hor;
                    }
                }
            }
        }, 1000);
    }

    $("#btn_pause").click(function () {
        clearInterval(cron);
        iniciado = false;
    });

    $("#btn_stop").click(function () {
        sv_min = 0;
        sv_hor = 0;
        sv_seg = 0;
        seg.innerHTML = "00";
        min.innerHTML = "00";
        hor.innerHTML = "00";
        clearInterval(cron);
        iniciado = false;
    });

    $("#btn_lap").click(function () {
        vueltas++;
        consola('<li class="list-group-item"><small>' + vueltas + '</small>     ' + hor.innerHTML + ":" + min.innerHTML + ":" + seg.innerHTML + '</li><input type="hidden" class="tempoLigacao" name="tempoligacao[]" value="' + hor.innerHTML + ":" + min.innerHTML + ":" + seg.innerHTML + '" />');
    });

    function consola(msg) {
        $("#log").prepend(msg);
    }

    $("#btn_clear").click(function () {
        $("#log").html("");
        vueltas = 0;
    });
});

$(document).on("click", ".enviarLigacao", function () {

    var currentdate = new Date();
    var datetime = currentdate.getDate() + "/" + (currentdate.getMonth() + 1) + "/" + currentdate.getFullYear();
    /*+ currentdate.getHours() + ":"  
    + currentdate.getMinutes() + ":" 
    + currentdate.getSeconds();*/
    var tempoLigacao = $('.tempoLigacao').last().val();

    $('#tabelaLigacoes').find('tbody').append('<tr><td>' + datetime + '</td><td>' + tempoLigacao + '</td><td><input type="hidden" name="datahora[]" value= "' + datetime + '" /></td><td><input type="hidden" name="duracao[]" value= "' + tempoLigacao + '" /></td></tr>');
});

$('#removeLigacao').on('click', function () {
    $('#tabelaLigacoes').find('tbody').find('tr').first().remove();
});

window.selecionarTitulo = function (ev, valor, id) {

    var linha = $(ev.target).parents('tr');
    var containerSelecionados = $('.titulosSelecionados');
    var htmlBtnRemover = "<i class='fa fa-close'></i>";
    var htmlInputHidden = '<input type="hidden" id=titulo' + id + ' name="titulos[]" value=' + id + ' />';

    linha.find('a.btn.btn-info').attr('onclick', 'removerLinha(event,' + valor + ',' + id + ')').removeClass('btn-info').addClass('btn-danger').html(htmlBtnRemover).next().removeAttr('disabled');

    containerSelecionados.append(htmlInputHidden);

    var valorAntigo = $("input[name=valororiginal]").val(),
        valorAntigo = valorAntigo.replace(/\./g, ""),
        valorAntigo = valorAntigo.replace(",", ".");

    valorNovo = parseFloat(valorAntigo) + parseFloat(valor);
    valorNovo = valorNovo.toFixed(2);

    $("#valororiginal").val(valorNovo.replace(".", ","));
    $("#valoracordado").val(valorNovo.replace(".", ","));
    $('#valoracordado').mask('000.000.000.000.000,00', { reverse: true });

    calculaParcelas();
    handleMasks();
};

window.removerLinha = function (ev, valor, id) {

    $('.titulosSelecionados').find('#titulo' + id).remove();
    var htmlBtnAdicionar = "<i class='fa fa-plus'></i>";

    var linha = $(ev.target).parents('tr');

    linha.find('a.btn.btn-danger').attr('onclick', 'selecionarTitulo(event,' + valor + ',' + id + ')').removeClass('btn-danger').addClass('btn-info').html(htmlBtnAdicionar).next().removeAttr('disabled');

    var valorAntigo = $("input[name=valororiginal]").val(),
        valorAntigo = valorAntigo.replace(/\./g, ""),
        valorAntigo = valorAntigo.replace(",", ".");

    valorNovo = parseFloat(valorAntigo) - parseFloat(valor);
    valorNovo = valorNovo.toFixed(2);

    $("#valororiginal").val(valorNovo.replace(".", ","));
    $("#valoracordado").val(valorNovo.replace(".", ","));
    $('#valoracordado').mask('000.000.000.000.000,00', { reverse: true });

    calculaParcelas();
    handleMasks();
};

$('#botaoParcelas').click(function () {

    var qtde = $("#numeroInicial").val();
    var data_primeira = $("#dataInicial").val();
    var d = $.datepicker.parseDate('dd/mm/yy', data_primeira);

    var num = $('.clonedInput').length;
    for (i = num; i > 1; i--) {
        removeParcela();
    }

    for (i = 1; i < qtde; i++) {
        adicionaParcela();
    }

    num = $('.clonedInput').length;
    for (j = 1; j <= num; j++) {
        $('#calendario' + j).datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
            dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'

        });
        $('#calendario' + j).datepicker('setDate', d);
        d.setMonth(d.getMonth() + 1);
    }
});

$("#finalizaLigacao").click(function () {
    $('.botaoSalvar').prop('disabled', false);
});

$("#addLigacao").click(function () {
    $('.finalizaLigacao').prop('disabled', false);
});

/***/ }),
/* 4 */,
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(0);
module.exports = __webpack_require__(1);


/***/ })
/******/ ]);