var btn = document.getElementById("btn");
btn.addEventListener("click", function(){
    $.get("exercicio4.php", function(data){
        dados = JSON.parse(data);

        for(var i = 0; i < dados.length ; i++){
            let linhas = dados[i];

            let salarioTotal = linhas["salario"]+linhas["subcidio"]+linhas["bonus"];
            let descontInss = salarioTotal*0.17;
            let salarioLiquido = salarioTotal - descontInss;

            $(".list").append(
                "<tr>" +
                 "<td>" + linhas["nuit"] + "</td>" +
                  "<td>" + linhas["inss"] + "</td>" +
                  "<td>" + linhas["nome"] + "</td>" +
                  "<td>" + linhas["sexo"] + "</td>" +
                  "<td>" + linhas["profissao"] + "</td>" +
                  "<td>" + linhas["salario"] + "</td>" +
                  "<td>" + linhas["subcidio"] + "</td>" +
                  "<td>" + linhas["bonus"] + "</td>" +
                  "<td>" + salarioTotal+ "</td>" +
                  "<td>" + descontInss.toFixed(2) + "</td>" +
                  "<td>" + salarioLiquido + "</td>" +
                  "</tr>"
              );
        }
    })
})