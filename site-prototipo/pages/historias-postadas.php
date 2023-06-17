<?php
    require 'includes/conexao.php';
    require 'includes/online.php';
    require 'returnUser.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="central.php">Central</a>

    <h1>Suas histórias</h1>

    <h2>Historias públicas</h2>
    <div>
        <?php

        $historiasPostadas = "SELECT * FROM story WHERE fk_id_profile";

        ?>
    </div>

    <h2>Historias em análise</h2>
    <div>
        <?php

        ?>
    </div>

    <h2>Historias esperando sua aprovação</h2>
    <div>
        <?php

        ?>
    </div>

</body>
</html>