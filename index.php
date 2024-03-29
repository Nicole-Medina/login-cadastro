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
    <link rel="shortcut icon" type="image/png" href="Parallax/icon_leaf.png">
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
    
    <section>
        <img src="Parallax/1.png" class="layer" data-speed="1">
        <img src="Parallax/2.png" class="layer" data-speed="3">
        <img src="Parallax/3.png" class="layer" data-speed="2">
        <img src="Parallax/4.png" class="layer" data-speed="-2">
        <img src="Parallax/5.png" class="layer" data-speed="-2">
        <img src="Parallax/6.png" class="layer" data-speed="2">
        <img src="Parallax/7.png" class="layer" data-speed="-2">

        <div class="bloco">
        <div class="container" id="main">    
                    
            <div class="aba_login">
                <div>

                    <form action="index.php" method="post">
                        <h1>Login</h1>
                        <p id="txt_inicial">Bem-vindo de volta, viajante!</p>

                        <div class="test">
                        <p class="notice"> <?php echo $notice; ?> </p>
                        </div>

                        <input type="email" name="email" placeholder="Email" required="">
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

            </div>"
        </div>

    </section>

    <!-- Script que realiza o funcionamento do efeito parallax -->
    <script type="text/javascript">
        document.addEventListener("mousemove" , parallax);
        // quando mousemove ocorre, chama a função parallax

        function parallax(e){
            this.querySelectorAll('.layer').forEach(layer => {
            // seleciona todos .layer e itera sobre cada um com forEach

                const speed = layer.getAttribute('data-speed');
                // obtém valor dos data-speed, velocidade do efeito

                const x = ( window.innerWidth - e.pageX * speed)/100;
                // calcula posição horiz. com base no mouse

                const y = ( window.innerHeight - e.pageY * speed)/100;
                // calcula posição verti. com base no mouse

                layer.style.transform = ` TranslateX( ${x}px ) TranslateY( ${y}px ) `;
                // aqui é definido a propriedade css transform
            })
        }
    </script>
    
</body>
</html>

<!-- http://localhost/login-cadastro/index.php -->