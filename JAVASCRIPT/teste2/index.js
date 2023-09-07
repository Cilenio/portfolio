$(document).ready(function () {
    function validar(precoUnitario, quantidade) {
        try {
            if (precoUnitario == "" || quantidade == "") {
                throw "precha os campos  corretamente"
            }
            if (isNaN(precoUnitario) || isNaN(quantidade)) {
                throw "precha os campos com numeros"
            }
        } catch (e) {
            alert(e)
            $(this).finish()
            return false
        }
        return true
    }

    function calcular(produto, precoUnitario, quantidade) {
        var custoReal = precoUnitario * quantidade
        var valorDoIva = custoReal * 0.16
        var custoDeVenda = custoReal + valorDoIva

        let dataTable = document.getElementById("tbody")
        let linha = dataTable.insertRow(0)
        linha.insertCell(0).innerHTML = produto
        linha.insertCell(1).innerHTML = precoUnitario
        linha.insertCell(2).innerHTML = quantidade
        linha.insertCell(3).innerHTML = custoReal
        linha.insertCell(4).innerHTML = valorDoIva.toFixed(2)
        linha.insertCell(5).innerHTML = custoDeVenda.toFixed(2)
    }

    $("#btn").click(function () {
        var produto = $("#produto").val()
        var precoUnitario = $("#precoUnidade").val()
        var quantidade = $("#qtyComercializada").val()

        if (validar(precoUnitario, quantidade)) {
            calcular(produto, precoUnitario, quantidade)
        }
    })

    $("#precoUnidade").blur(function () {
        if ($("#precoUnidade").val() == "") {
            alert("Prencha o campo corretamente")
        } else if (isNaN($("#precoUnidade").val())) {
            alert("Prencha o campo corretamente")
        }
    })

    $("#qtyComercializada").blur(function () {
        if ($("#qtyComercializada").val() == "") {
            alert("Prencha o campo corretamente")
        } else if (isNaN($("#qtyComercializada").val())) {
            alert("Prencha o campo corretamente")
        }
    })

    $("#btn2").click(() => {
        let dataTable = document.getElementById("tbody2")
        while (dataTable.hasChildNodes()) {
            dataTable.removeChild(dataTable.lastChild)
        }
        $.get("index.php", function (data) {
            var dados = JSON.parse(data)
            for (let i = 0; i < dados.length; i++) {
                var estudantes = new Array()
                estudantes = dados[i]

                var mediaAS =
                    (estudantes["AS1"] + estudantes["AS2"] + estudantes["AS3"]) / 3
                var mediaFinal =
                    (estudantes["AP"] + estudantes["trabPratico"] + mediaAS) / 3
                var resultado;
                if (mediaFinal < 10) {
                    resultado = "REPROVADO"
                }else{
                    resultado = "APROVADO"
                }

                let linha = dataTable.insertRow(0);
                linha.insertCell(0).innerHTML = estudantes["codEst"]
                linha.insertCell(1).innerHTML = estudantes["codDisc"]
                linha.insertCell(2).innerHTML = mediaAS.toFixed(2)
                linha.insertCell(3).innerHTML = mediaFinal.toFixed(2)
                linha.insertCell(4).innerHTML = mediaFinal.toFixed(2)
            }
        })
    })
})
