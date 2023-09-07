var tudoOk = true;

function validaNumero(numero) {
  try {
    if (numero == "") throw "Nao pode ser vazio, digita o seu valor";
    if (isNaN(numero))
      throw "Digitou Palavra, num campo que espera receber valor numerico";
    if (Number(numero) < 0 || Number(numero) > 20)
      throw "O numero deve estar entre 0 a 20";
    return true;
  } catch (erro) {
    alert("Erro: " + erro);
    return false;
  }
}
var dados = [];
function emitePauta() {
  var txtT1, txtT2, txtT3;
  var codigo = document.getElementById("txtCodigo").value;
  var disc = document.querySelector('[name="disciplinas"').value;
  txtT1 = Number(document.getElementById("txtT1").value);

  if (!validaNumero(document.getElementById("txtT1").value)) {
    document.getElementById("txtT1").focus;
  } else {
    txtT2 = Number(document.getElementById("txtT2").value);
    if (!validaNumero(document.getElementById("txtT2").value)) {
      alert("Nao foi processada a pauta");
      document.getElementById("txtT2").focus;
    } else {
      txtT3 = Number(document.getElementById("txtT3").value);
      if (!validaNumero(document.getElementById("txtT3").value)) {
        document.getElementById("txtT3").focus;
      } else {
        var medAnual = (txtT1 + txtT2 + txtT3) / 3;
        var result = "";
        if (medAnual < 10) {
          result = "excluido";
        }
        if (medAnual >= 14) {
          result = "dispensado";
        }
        if (medAnual >= 10 && medAnual < 14) {
          result = "ADMITIDO";
        }
      }
    }
    var estudante = {
      CodEst: codigo,
      disciplina: disc,
      medT1: txtT1,
      medT2: txtT2,
      medT3: txtT3,
      resultado: result,
      mediaAn: medAnual,
    };
    dados.push(estudante);
    let dataTable = document.getElementById("tbody");
    while (dataTable.hasChildNodes()) {
      dataTable.removeChild(dataTable.lastChild);
    }
    for (let i = 0; i < dados.length; i++) {
      let linha = dataTable.insertRow(0);
      let columCodigo = linha.insertCell(0);
      let columDisciplina = linha.insertCell(1);
      let columMedia1 = linha.insertCell(2);
      let columMedia2 = linha.insertCell(3);
      let columMedia3 = linha.insertCell(4);
      let columMediaA = linha.insertCell(5);
      let columResultado = linha.insertCell(6);
      columCodigo.innerHTML = dados[i].CodEst;
      columDisciplina.innerHTML = dados[i].disciplina;
      columMedia1.innerHTML = dados[i].medT1;
      columMedia2.innerHTML = dados[i].medT2;
      columMedia3.innerHTML = dados[i].medT3;
      columMediaA.innerHTML = dados[i].mediaAn;
      columResultado.innerHTML = dados[i].resultado;
    }
  }
  limparFormulario();
}
function limparFormulario() {
  document.getElementById("txtCodigo").value = null;
  document.getElementById("txtT1").value = null;
  document.getElementById("txtT2").value = null;
  document.getElementById("txtT3").value = null;
}
