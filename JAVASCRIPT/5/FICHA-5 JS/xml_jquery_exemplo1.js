$(document).ready(function(){
    var insert = document.getElementById("esteCampo");
    list="";
    procedimentos=""
    $.ajax({
        type: 'GET',
        url: 'xml_jquery_exemplo1.xml',
        dataType: 'xml',
        success: function(xml){
            //localiza todos itens com tags ingredientes 
            $(xml).find('turma').each(function(){

                /* Recupera os itens com tags Produto, Unidade, Quantidade, Estado
                dentro de cada ingrediente no XML. */

                list += $(this).find('produto').text() + '</br>' +
                '<ul>' + 
                     '<li>' + $(this).find('unidade').text() +  '</li>' +
                     '<li>' + $(this).find('quantidade').text() +  '</li>' +
                     '<li>' + $(this).find('estado').text() +  '</li>' +
                '</ul>' 
            });
            console.log(list);

            $(insert).append(list);

            $(xml).find('instrucoes').each(function(){

                procedimentos += '<p>' +$(this).find('passo').text() + '</p>' ;
            });
            console.log(procedimentos);

            $(document.getElementById("instrucoes")).append(procedimentos);
        }
    })
})