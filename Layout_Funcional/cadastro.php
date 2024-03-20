<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container" id="main">    
               
        <div class="aba_direcionar"> 
            <div id="visit-taverna" class="direcionar">
                <h1>Explorador experiente?<h1>
                <p id="txt_logar">Já é familiarizado com os vilarejos? Entre com a sua conta!
                </p>
                <a href="loginpage.php" id="direc_login">Entre</a>
            </div>
        </div>
        <div class="aba_cadastro">
            <div class="entrar">
                <h1>Cadastre-se</h1>
                <p id="txt_cdstr">Desafie o destino, forje sua história!</p>
                <form action="#" method="post">
                    <input type="text" name="txt" placeholder="Nome de usuário" required="">
                    <input type="email" name="email" placeholder="Endereço de e-mail" required="">
                    <input type="password" name="pswd" placeholder="Senha" required="">
                    <input type="password" name="pswd" placeholder="Confirmar senha" required="">
                    <button id="explore">Juntar-se</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script src="script.js"></script>

<!-- http://localhost/test-derick/Layout_Funcional/cadastro.php -->