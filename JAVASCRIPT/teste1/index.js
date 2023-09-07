$(document).ready(function () {
  $("#btn").click(function () {
    var produto = $("#produto").val();
    var precoUnitario = $("#precoUnidade").val();
    var quantidade = $("#qtyComercializada").val();

    if (validar(precoUnitario) && validar(quantidade)) {
      calcular(produto, precoUnitario, quantidade);
    }
  });

  $("#precoUnidade").blur(function () {
    validar($("#precoUnidade").val());
  });

  $("#qtyComercializada").blur(function () {
    validar($("#qtyComercializada").val());
  });
  function validar(campo) {
    try {
      if (campo == "") {
        throw "precha os campos  corretamente";
      }
      if (isNaN(campo)) {
        throw "precha os campos com numeros";
      }
      return true;
    } catch (e) {
      alert(e);
      $(this).finish();
      return false;
    }
  }
  function calcular(produto, precoUnitario, quantidade) {
    var custoReal = precoUnitario * quantidade;
    var valorDoIva = custoReal * 0.16;
    var custoDeVenda = custoReal + valorDoIva;

    let dataTable = document.getElementById("tbody");
    let linha = dataTable.insertRow(0);
    linha.insertCell(0).innerHTML = produto;
    linha.insertCell(1).innerHTML = precoUnitario;
    linha.insertCell(2).innerHTML = quantidade;
    linha.insertCell(3).innerHTML = custoReal;
    linha.insertCell(4).innerHTML = valorDoIva.toFixed(2);
    linha.insertCell(5).innerHTML = custoDeVenda.toFixed(2);
  }

  $("#btn2").click(() => {
    let dataTable = document.getElementById("tbody2");
    while (dataTable.hasChildNodes()) {
      dataTable.removeChild(dataTable.lastChild);
    }
    $.get("index.php", function (data) {
      var dados = JSON.parse(data);
      for (let i = 0; i < dados.length; i++) {
        var estudantes = new Array();
        estudantes = dados[i];

        var mediaAS =
          (estudantes["AS1"] + estudantes["AS2"] + estudantes["AS3"]) / 3;
        var mediaFinal =
          (estudantes["AP"] * 0.5 +
            estudantes["trabPratico"] * 0.2 +
            mediaAS * 0.3) /
          3;
        var resultado;
        if (mediaFinal < 10) {
          resultado = "REPROVADO";
        } else {
          resultado = "APROVADO";
        }
        let linha = dataTable.insertRow(0);
        linha.insertCell(0).innerHTML = estudantes["codEst"];
        linha.insertCell(1).innerHTML = estudantes["codDisc"];
        linha.insertCell(2).innerHTML = mediaAS.toFixed(2);
        linha.insertCell(3).innerHTML = mediaFinal.toFixed(2);
        linha.insertCell(4).innerHTML = mediaFinal.toFixed(2);
      }
    });
  });
});
