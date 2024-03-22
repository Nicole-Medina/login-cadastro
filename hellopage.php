<?php
session_start();

// Aqui é verificado se o login foi realizado
if (!isset($_SESSION["email"]) || empty($_SESSION["email"])) {
    // Se não estiver autenticado/logado, redireciona para a página de login
    header("Location: index.php");
    exit();
}

$nome = $_SESSION["username"];
//limitar a um máximo de 12 caracteres
?>

<!DOCTYPE html!>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="shortcut icon" type="image/png" href="Parallax/icon_sheet.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body class="body-initial">
    
    <form method="post" action="index.php">
        <button class="sessao"> ✖ Encerrar sessão ✖ </button>
        <input type="text" style="visibility: hidden" name="logout" value="1">
    </form>
        
        <div class="saudacao">

            <h2>Olá! <?php echo $nome; ?></h2>
            <p>Bem-vindo(a), o que deseja fazer hoje?</p>

        </div>

    </body>
</html>

<!-- http://localhost/login-cadastro/hellopage.php -->