var btn = document.getElementById("btn");
btn.addEventListener("click", function(){
    $.get("exercicio1.php", function(data){
        alert("DATA LOADED" + data);
    });
});