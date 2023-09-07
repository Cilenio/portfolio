var btn = document.getElementById("btn");
btn.addEventListener("click", function () {
  $.get("exercicio2.php", function (data) {
    alert("DATA LOADED" + data);
    var dados = JSON.parse(data);
    $("#cobra,td").remove();
    for (var i = 0; i < dados.length ; i++) {
      console.log(dados[i]);
      var linhas = dados[i];
      $(".list").append(
        "<tr id='cobra'>" +
         "<td>" + linhas[0] + "</td>" +
          "<td>" + linhas[1] + "</td>" +
          "<td>" + linhas[2] + "</td>" +
          "<td>" + linhas[3] + "</td>" +
          "<td>" + linhas[4] + "</td>" +
          "</tr>"
      );
    }
  });
});
