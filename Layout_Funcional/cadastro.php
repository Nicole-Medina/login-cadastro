<?php
// Conexão com o banco de dados
include_once 'conexao.php';

$init = null;
$flag = 0;
$notice = $init;

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $name = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];


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
        $notice = "Este usuário já existe!";
        $flag = 0;
    }else{
        // Insere os dados na tabela de usuários (simulação)
        $sql = "INSERT INTO usuarios (username, password, email) VALUES ('$name', '$password', '$email')";
        $flag = 1;
        if (mysqli_query($conn, $sql)) {
            $notice = "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário: " . mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);
}
?>

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
                <a href="index.php" id="direc_login">Entre</a>
            </div>
        </div>
        <div class="aba_cadastro">
            <div class="entrar">
                <h1>Cadastre-se</h1>
                <p id="txt_cdstr">Desafie o destino, forje sua história!</p>

                <div class="test">
                    <p class="notice" style="<?php if($flag == 1): echo "color: green"?><?php endif;?>"> <?php echo $notice; ?> </p>
                </div>

                <form action="cadastro.php" method="post">
                    <input type="text" name="username" placeholder="Nome de usuário" required="">
                    <input type="email" name="email" placeholder="Endereço de e-mail" required="">
                    <input type="password" name="password" placeholder="Senha" required="">
                    <button id="associate">Juntar-se</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script src="script.js"></script>

<!-- http://localhost/login-cadastro/Layout_Funcional/cadastro.php -->