<link rel="stylesheet" type="text/css" href="/css/sweetalert2.css">

<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="/js/sweetalert2.min.js"></script>

<script>
(function ($, DataTable) {
    "use strict";

    function checkAll() {
      var checkboxes = document.getElementsByTagName('input');
      for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].type == 'checkbox') {
          checkboxes[i].checked = !checkboxes[i].checked;
        }
      }         
    }

    DataTable.ext.buttons.selecionarTodos = {
        className: 'buttons-selecionar-todos',

        text: function (dt) {
            return '<i class="fa fa-check"></i> Selecionar Todos';
        },

        action: function (e, dt, button, config) {
            checkAll();
        }
    };

    DataTable.ext.buttons.enviarMarcados = {
        className: 'buttons-enviar-marcados',

        text: function (dt) {
            return '<i class="fa fa-arrow-right"></i> Enviar Marcados';
        },

        action: function (e, dt, button, config) {
            var form = $('form#avisoform');
            var existemCheckboxesMarcadas = form.find('input[type="checkbox"]:checked').length;

            //if (existemCheckboxesMarcadas) {
                if (form.length) {
                    form.submit();
                }
            //}

           //else {
           //    setTimeout(function() {
           //    swal(
           //      'Oops...',
           //      'Something went wrong!',
           //      'error'
           //  );
           //    }, 100);
           //}


        }
    };
})(jQuery, jQuery.fn.dataTable);
</script>
