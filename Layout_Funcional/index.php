<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o formulário foi submetido para logout
    if (isset($_POST["logout"])) {
        session_destroy();
    }
}

$init = null;
$one = "Senha incorreta!";
$two = "Usuário não encontrado!";

$notice = $init;


// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["logout"])) {
    // Verifica se as variáveis de email e senha foram enviadas
    if(isset($_POST["email"]) && isset($_POST["password"])) {

    // Coleta os dados do formulário
    $email = $_POST["email"];
    $pass = $_POST["password"];

    // Conexão com o banco de dados
    include_once 'conexao.php';

    // Consulta SQL para verificar se o usuário existe e a senha está correta
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    // Preparar a consulta
    $stmt = mysqli_prepare($conn, $sql);

    // Vincular parâmetros
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Executar a consulta
    mysqli_stmt_execute($stmt);

    // Obter o resultado da consulta
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        // Usuário encontrado, verifica a senha
        $row = mysqli_fetch_assoc($result);
        if ($pass === $row['password']) {
            // Senha correta, define a sessão e redireciona para a página inicial
            $_SESSION["email"] = $email;
            $_SESSION["username"] = $row["username"];
            header("Location: hellopage.php");
            exit();
        } else {
            // Senha incorreta
            $notice = $one;
        }
    } else {
        // Usuário não encontrado
        $notice = $two;
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
    <div class="container" id="main">    
               
        <div class="aba_login">
            <div>

                <form action="index.php" method="post">
                    <h1>Login</h1>
                    <p id="txt_inicial">Bem-vindo de volta, viajante!</p>

                    <div class="test">
                    <p class="notice"> <?php echo $notice; ?> </p>
                    </div>

                    <input type="text" name="email" placeholder="Email" required="">
                    <input type="password" name="password" placeholder="Senha" required="">
                    <button id="explore">Explorar</button>
                </form>

            </div>
        </div>

        <div class="aba_direcionar"> 
            <div id="visit-taverna" class="cadastrar">
                <h1>Visite a taverna!</h1>
                <p>Canecas cheias e bardos a todo vapor. Não deixe de participar, para novatos a primeira rodada é por conta da casa!
                </p>
                <a href="cadastro.php" id="direc_cadastro">Cadastre-se</a> <!-- modifiquei de botão para um link p/ cadastro-page -->
            </div>
        </div>

    </div>
</body>
</html>

<!-- http://localhost/login-cadastro/Layout_Funcional/index.php -->