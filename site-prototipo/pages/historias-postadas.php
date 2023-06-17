<?php
    require 'includes/conexao.php';
    require 'includes/online.php';
    require 'includes/returnUser.php';
    $email = $_SESSION['email'];
    $profile = returnProfileId($email);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
</head>
<body>
    <a href="central.php">Central</a>

    <h1>Suas histórias</h1>

    <h2>Historias públicas</h2>
    <div>
        <?php
            $historiasPostadas = "SELECT * FROM story WHERE fk_id_profile = '$profile' AND status = 3";
            $prepare = $pdo->prepare($historiasPostadas);
            $prepare->execute();

            if($prepare->rowCount() <= 0){
                echo "<p>Você não possui histórias postadas</p>";
            }else{
                foreach($pdo->query($historiasPostadas) as $key => $value){
                    $title = $value['nome'];
                    $id_story = $value['id_story'];
                    echo "<a href='story.php?input_1=$id_story'>$title</a>";
                }
            }

        ?>
    </div>

    <h2>Historias em análise</h2>
    <div>
        <?php
            $historiasAnalise = "SELECT * FROM story WHERE fk_id_profile = '$profile' AND status = 1";
            $prepare = $pdo->prepare($historiasAnalise);
            $prepare->execute();

            if($prepare->rowCount() <= 0){
                echo "<p>Você não possui histórias em análise</p>";
            }else{
                foreach($pdo->query($historiasAnalise) as $key => $value){
                    $title = $value['nome'];
                    echo $title;
                }
            }
        ?>
    </div>

    <h2>Historias esperando sua aprovação</h2>
    <div>
        <p>Entre na história e verifique as mudanças que o nosso corretor fez, caso esteja de seu agrado aprove a história para que outros usuários possam a ler</p>
        <?php
            $historiasAprovar = "SELECT * FROM story WHERE fk_id_profile = '$profile' AND status = 2";
            $prepare = $pdo->prepare($historiasAprovar);
            $prepare->execute();

            if($prepare->rowCount() <= 0){
                echo "<p>Você não possui histórias para aprovar</p>";
            }else{
                foreach($pdo->query($historiasAprovar) as $key => $value){
                    $title = $value['nome'];
                    $id_story = $value['id_story'];
                    echo "<a href='check_story.php?input_1=$id_story'>$title</a>";
                }
            }
        ?>
    </div>

</body>
</html>