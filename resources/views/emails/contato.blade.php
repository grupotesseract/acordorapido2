<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0; margin-top:10px;">
        <tbody>
            <tr align="center">
                <td align="center" style="text-align:center;">
                    <p style="font-size:14px; font-weight:normal; margin-top:10px;">
                        <span>Nome completo: </span> {{ $contato->nome }} <br>
                        <span>Email: </span> {{ $contato->email }} <br>
                        <span>Escola: </span> {{ $contato->escola }} <br>
                        <span>Mensagem: </span> {{ $contato->mensagem }} <br>
                        <span>Criado em: </span> {{ $contato->created_at->format('d/m/Y - H:i') }} <br>
                    </p>
                    <br> <hr>
                    <p style="font-size:10px; font-weight:bold; margin-top:0px;">
                        * mensagem automática gerada a partir do formulário de contato do site*
                    </p>

                </td>
            </tr>
        </tbody>
        </table>
    </div>
</td>
