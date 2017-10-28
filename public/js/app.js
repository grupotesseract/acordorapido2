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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {


__webpack_require__(4);

/***/ }),
/* 1 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 3 */,
/* 4 */
/***/ (function(module, exports) {

//Quando ready...
$(function () {

  //span que contem o data-target 
  var contadorCaracteres = $('#contador-caracteres');

  //Se existir um contador de caracteres na tela, binda o contador ao seu target
  if (contadorCaracteres.length) {
    bindContadorCaracteres(contadorCaracteres);
  }

  //Botao de habilitar edicao do password
  var btnTrocaSenha = $('#btn-trocar-senha');

  //Se existir um contador de caracteres na tela, binda o contador ao seu target
  if (contadorCaracteres.length) {
    bindContadorCaracteres(contadorCaracteres);
  }

  function habilitaCamposPassword() {
    $('input[type="password"]').removeAttr('disabled');
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
  swal('Oops...', 'Something went wrong!', 'error');
};

$(document).on("click", ".enviarligacao", function () {
  var id = $(this).data('id');
  $("#aviso_id").val(id);
});

$(document).on("click", "#titulos", function () {
  var valor = parseFloat($(".valororiginal").val());
  var valorasersomado = parseFloat($('#titulos').val());
  var valorsomado = 0;

  if ($('#titulos').prop("checked")) {
    valorsomado = valor + valorasersomado;
  } else {
    valorsomado = valor - valorasersomado;
  }

  console.log(valorsomado);
  $(".valororiginal").val(valorsomado);
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
    consola('<li class="list-group-item"><small>' + vueltas + '</small>     ' + hor.innerHTML + ":" + min.innerHTML + ":" + seg.innerHTML + '</li><input type="hidden" name="tempoligacao[]" value="' + hor.innerHTML + ":" + min.innerHTML + ":" + seg.innerHTML + '" />');
  });

  function consola(msg) {
    $("#log").prepend(msg);
  }

  $("#btn_clear").click(function () {
    $("#log").html("");
    vueltas = 0;
  });
});

/***/ }),
/* 5 */,
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(0);
__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ })
/******/ ]);