let contador = 99;

function carregarSaudacao() {
    contador = contador + 1;
    var xhr = new XMLHttpRequest();
    window.location = "teste.html";
    xhr.onreadystatechange = function() {
        var resposta = xhr.responseText;
        console.log(resposta);
        document.getElementById("saudacao").innerHTML = resposta;
        document.getElementById("contador").innerHTML = contador;
    };

    xhr.open("GET", "saudacao.php", true);

    xhr.send();
};
