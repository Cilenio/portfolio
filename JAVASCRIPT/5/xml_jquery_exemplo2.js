$(document).ready(function() {
   var linha = '';
    $.ajax({
        type: 'get',
        url: 'xml_jquery_exemplo2.xml',
        dataType: 'xml',
        sucess: function(xml){
            console.log("w")
            $(xml).find('estudante').each(function(){
                linha += 
                '<tr>' +
                    '<td>' + $(this).find('codigo').text() + '</td>' +
                    '<td>' + $(this).find('nome').text() + '</td>' +
                    '<td>' + $(this).find('curso').text() + '</td>' +
                    '<td>' + $(this).find('media').text() + '</td>' +
                '</tr>';
            })
            console.log(linha);
            document.getElementById('tbBody').append(linha);
        }
    })
})