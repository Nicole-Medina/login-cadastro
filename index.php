<?php
    $nomes = array("Nicole", "Derick", "Batata", "Marta");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Integração</title>
</head>
<body>
    <?php foreach($nomes as $nome): ?>
        <h1><?php echo $nome; ?></h1>
    <?php endforeach; ?>

    <script src="script.js"></script>
</body>
</html>