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


    // Consulta sobre nome de usuário
    $sql_check_username = "SELECT * FROM usuarios WHERE username = ?";
    
    // Preparar a consulta de username
    $stmt_check_username = mysqli_prepare($conn, $sql_check_username);

    // Vincular parâmetros
    mysqli_stmt_bind_param($stmt_check_username, "s", $name);

    // Executar a consulta
    mysqli_stmt_execute($stmt_check_username);

    // Obter o resultado da consulta username
    $result_check_username = mysqli_stmt_get_result($stmt_check_username);


    $sql = "SELECT * FROM usuarios WHERE email = ?";
    // Preparar a consulta
    $stmt = mysqli_prepare($conn, $sql);

    // Vincular parâmetros
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Executar a consulta
    mysqli_stmt_execute($stmt);

    // Obter o resultado da consulta email
    $result = mysqli_stmt_get_result($stmt);


    if (strlen($password) < 8 ){ //strlen() converte o objeto(var) em string
        $notice = "Senha mínima de 8 caracteres.";
        $flag = 0;
        
    } elseif (strlen($name) > 12) {
        $notice = "Nome máximo de 12 caracteres.";
        $flag = 0;

    } elseif (mysqli_num_rows($result_check_username) > 0) {
        $notice = "Nome de usuário indisponível.";
        $flag = 0;

    } elseif ($result && mysqli_num_rows($result) > 0) {
        $notice = "Email indisponível.";
        $flag = 0;
        
    }else{
        
        // Insere os dados na tabela de usuários
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
                            <p class="notice" style="<?php if($flag == 1): echo "color: green"?><?php endif;?>">
                            <?php echo $notice; ?>
                            </p>
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

<!-- http://localhost/login-cadastro/cadastro.php -->