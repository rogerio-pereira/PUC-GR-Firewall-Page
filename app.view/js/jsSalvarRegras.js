function adicionaRegra(campo)
{
    var numero = Number($('#numeroCampos'+campo).val()) + 1;
    var html =  "<div class='row' id='"+campo+"_"+numero+"'>                                                        "+
                "    <div class='4u'>                                                                               "+
                "        <input                                                                                     "+
                "            type='text'                                                                            "+
                "            id='ipOrigem"+campo+"_"+numero+"'                                                      "+
                "            name='ipOrigem"+campo+"_"+numero+"'                                                    "+
                "            class='ip'                                                                             "+
                "            placeholder='Ip de Origem'                                                             "+
                "            required                                                                               "+
                "        >                                                                                          "+
                "    </div>                                                                                         "+
                "                                                                                                   "+
                "    <div class='4u'>                                                                               "+
                "        <input                                                                                     "+
                "            type='text'                                                                            "+
                "            id='ipDestino"+campo+"_"+numero+"'                                                     "+
                "            name='ipDestino"+campo+"_"+numero+"'                                                   "+
                "            class='ip'                                                                             "+
                "            placeholder='Ip de Destino'                                                            "+
                "            required                                                                               "+
                "        >                                                                                          "+
                "    </div>                                                                                         "+
                "                                                                                                   "+
                "    <div class='3u'>                                                                               "+
                "        <select name='acao"+campo+"_"+numero+"' id='acao"+campo+"_"+numero+"' required>            "+
                "            <option value='' selected disabled></option>                                           "+
                "            <option value='ACCEPT'>Bloquear</option>                                               "+
                "            <option value='REJECT'>Permitir</option>                                               "+
                "        </select>                                                                                  "+
                "    </div>                                                                                         "+
                "                                                                                                   "+
                "    <div class='1u center'>                                                                        "+
                "        <img                                                                                       "+
                "            src='/app.view/img/template/apagar.png'                                                "+
                "            class='iconeApagar'                                                                    "+
                "            onclick=\"apagar('"+campo+"', "+numero+")\"                                            "+
                "        >                                                                                          "+
                "    </div>                                                                                         "+
                "</div>                                                                                             ";

    $('#campos'+campo).append(html);
    $('#numeroCampos'+campo).val(numero);
    $('.ip').mask('999.999.999.999');
}

function apagar(campo, numero)
{
    $('#'+campo+'_'+numero+'').html('');
}