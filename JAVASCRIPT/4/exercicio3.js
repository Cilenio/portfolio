btn = document.getElementById("btn")
btn.addEventListener("click", function(){
    $.get("exercicio3.php", function(data){
        alert("DATA LOADED"+ data)
        var  dados = JSON.parse(data);

        for(var i = 0; i < dados.length ; i++){
            let linhas = dados[i];

            let custoSemIva = linhas[3] * linhas[2];
            let custoIva =  (custoSemIva * 0.17);
            let custoVenda = custoIva + custoSemIva

            $(".list").append(
                "<tr>" +
                 "<td>" + linhas[0] + "</td>" +
                  "<td>" + linhas[1] + "</td>" +
                  "<td>" + linhas[3] + "</td>" +
                  "<td>" + linhas[2] + "</td>" +
                  "<td>" + custoSemIva + "</td>" +
                  "<td>" + custoIva.toFixed(2) + "</td>" +
                  "<td>" + custoVenda.toFixed(2) + "</td>" +
                  "</tr>"
              );
        }
    })
})