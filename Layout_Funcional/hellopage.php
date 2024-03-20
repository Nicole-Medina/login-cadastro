<?php

$nome = 'Nicole';

?>
<!DOCTYPE html!>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body class="body-initial">
        
    <button class="sessao"> ✖ Encerrar sessão ✖ </button>
        
        <div class="saudacao">

            <h2>Olá! <?php echo $nome; ?></h2>
            <p>Bem-vindo(a), o que deseja fazer hoje?</p>

        </div>

    </body>
</html>
<!-- http://localhost/test-derick/Layout_Funcional/hellopage.php -->