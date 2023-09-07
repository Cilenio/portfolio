$(document).ready(function () {
  $("#btn").click(function () {
    var inss = $("#inss").val();
    var nome = $("#nome").val();
    var sbase = $("#sbase").val();
    var ocupacao = $("#ocupacao option:selected").val();
    var bonificacoes = $("#bonificacoes").val();

    if (
      validar(inss) &&
      validar(nome) &&
      validar(sbase) &&
      validar(bonificacoes) &&
      validar(ocupacao)
    ) {
      calcular(inss, nome, sbase, bonificacoes, ocupacao);
    }
  });

  $("#inss").blur(function () {
    validar($("#inss").val());
  });

  $("#nome").blur(function () {
    validar($("#nome").val());
  });
  $("#sbase").blur(function () {
    validar($("#sbase").val());
  });
  $("#bonificacoes option:selected").blur(function () {
    validar($("#bonificacoes option:selected").val());
  });
  $("#ocupacao").blur(function () {
    validar($("#ocupacao").val());
  });

  function validar(campo) {
    try {
      if (campo == "") {
        throw "precha os campos  corretamente";
      }
      return true;
    } catch (e) {
      alert(e);
      $(this).finish();
      return false;
    }
  }
  function calcular(inss, nome, sbase, bonificacoes, ocupacao) {
    var salariototal = parseFloat(sbase) + parseFloat(bonificacoes);
    console.log(salariototal);
    var desconto = salariototal * 0.07;
    var salarioliquido = salariototal - desconto;

    let dataTable = document.getElementById("tbody");
    let linha = dataTable.insertRow(0);
    linha.insertCell(0).innerHTML = inss;
    linha.insertCell(1).innerHTML = nome;
    linha.insertCell(2).innerHTML = ocupacao;
    linha.insertCell(3).innerHTML = sbase;
    linha.insertCell(4).innerHTML = bonificacoes;
    linha.insertCell(5).innerHTML = salariototal;
    linha.insertCell(6).innerHTML = desconto.toFixed(2);
    linha.insertCell(7).innerHTML = salarioliquido.toFixed(2);
  }

  $("#btn2").click(() => {
    let dataTable = document.getElementById("tbody2");
    while (dataTable.hasChildNodes()) {
      dataTable.removeChild(dataTable.lastChild);
    }
    $.get("index.php", function (data) {
      var dados = JSON.parse(data);
      for (let i = 0; i < dados.length; i++) {
        var products = new Array();
        products = dados[i];
        var valorsemiva = products["precoUnit"] * products["quantidade"];
        var valordoiva = valorsemiva * 0.16;
        var custodavenda = valorsemiva - valordoiva;

        let linha = dataTable.insertRow(0);
        linha.insertCell(0).innerHTML = products["codVenda"];
        linha.insertCell(1).innerHTML = products["produto"];
        linha.insertCell(2).innerHTML = products["precoUnit"];
        linha.insertCell(3).innerHTML = products["quantidade"];
        linha.insertCell(4).innerHTML = valorsemiva;
        linha.insertCell(5).innerHTML = valordoiva.toFixed(2);
        linha.insertCell(6).innerHTML = custodavenda;
      }
    });
  });
});
