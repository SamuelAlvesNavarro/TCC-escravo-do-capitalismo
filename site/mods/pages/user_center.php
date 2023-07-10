<?php
    require "includes/conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Controle de Usuários</title>
</head>
<body data-bs-theme="dark">
    <h1>Relação dos Usuários</h1>
    <ul class="list-group">

        <?php
            $sql = "select user_common.nome as nome, profile.id_profile as id_prof from user_common, profile where user_common.fk_id_profile = profile.id_profile";
            foreach ($pdo->query($sql) as $key => $value) {
                $nome = $value['nome'];
                $profile = $value['id_prof'];

                echo '<a href="user.php?profile='.$profile.'"><li class="list-group-item">('.$profile.') '.$nome.'</li></a>';
            }
        ?>

    </ul>
</body>
</html>