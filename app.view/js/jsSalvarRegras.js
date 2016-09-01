function adicionaRegra(campo)
{
    var numero = Number($('#numeroCampos'+campo).val()) + 1;
    var html =  "<div class='row' id='"+campo+"_"+numero+"'>                                                        "+
                "    <div class='3u'>                                                                               "+
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
                "    <div class='1u'>                                                                               "+
                "        <input                                                                                     "+
                "            type='number'                                                                            "+
                "            id='portaOrigem"+campo+"_"+numero+"'                                                   "+
                "            name='portaOrigem"+campo+"_"+numero+"'                                                 "+
                "            placeholder='Porta de Origem'                                                          "+
                "            required                                                                               "+
                "        >                                                                                          "+
                "    </div>                                                                                         "+
                "                                                                                                   "+
                "    <div class='3u'>                                                                               "+
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
                "    <div class='1u'>                                                                               "+
                "        <input                                                                                     "+
                "            type='number'                                                                            "+
                "            id='portaDestino"+campo+"_"+numero+"'                                                  "+
                "            name='portaDestino"+campo+"_"+numero+"'                                                "+
                "            placeholder='Porta de Destino'                                                         "+
                "            required                                                                               "+
                "        >                                                                                          "+
                "    </div>                                                                                         "+
                "                                                                                                   "+
                "    <div class='3u'>                                                                               "+
                "        <select name='acao"+campo+"_"+numero+"' id='acao"+campo+"_"+numero+"' required>            "+
                "            <option value='' selected disabled></option>                                           "+
                "            <option value='REJECT'>Bloquear</option>                                               "+
                "            <option value='ACCEPT'>Permitir</option>                                               "+
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

    if($('input[name=operacao]:radio:checked').val() == 'whitelist')
        $('#acao'+campo+"_"+numero).val('ACCEPT');
    else
        $('#acao'+campo+"_"+numero).val('REJECT');
}

function apagar(campo, numero)
{
    $('#'+campo+'_'+numero+'').html('');
}

function buscaCampos(campo)
{
    var total   = $('#numeroCampos'+campo).val();
    var campos  = new Array();

    for(i=1; i<=total; i++)
    {
        var valores = [];

        valores[0]  = $('#ipOrigem'+campo+'_'+i).val();
        valores[1]  = $('#portaOrigem'+campo+'_'+i).val();
        valores[2]  = $('#ipDestino'+campo+'_'+i).val();
        valores[3]  = $('#portaDestino'+campo+'_'+i).val();
        valores[4]  = $('#acao'+campo+'_'+i).val();

        campos.push(valores);
    }

    return campos;
}

$(document).ready(function() 
{ 
    $('#firewallForm').submit(function(e) 
    {
        e.preventDefault();

        var operacao    = $('input[name=operacao]:radio:checked').val();
        var forward     = buscaCampos('Forward');
        var input       = buscaCampos('Input');
        var output      = buscaCampos('Output');

        $.ajax
        ({
            type: "POST",
            url: "../../app.control/controladorSalvarRegras.php",
            data: 
            {
                operacao:   operacao,
                forward:    forward,
                input:      input,
                output:     output,
            },
            success: function(data)
            {
                if(data > '0')
                    alert('Salvo com Sucesso!');
                esle
                    alert('Erro ao enviar os dados');
            },
            error: function(data)
            {
                alert('Erro ao enviar os dados');
            }
        });
    });
}); 