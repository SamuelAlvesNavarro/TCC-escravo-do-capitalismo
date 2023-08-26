<?php
    include "includes/conexao.php";
    include "includes/online.php";

    $perfil = $_SESSION['perfil'];

    $user = "SELECT nome FROM user_common WHERE fk_id_profile = $perfil";
    foreach($pdo->query($user) as $key => $value){
        $name = $value['nome'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentários do usuário <?php echo $name; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
</head>
<body data-bs-theme="dark">
    <?php
        require "includes/menu.php";
    ?>
    <h1>Comentários</h1>

    <?php
        $comment = "SELECT * FROM comment WHERE fk_id_profile = $perfil";
        $prepare = $pdo->prepare($comment);
        $prepare->execute();
        if($prepare->rowCount() == 0){
            echo "<p>O usuário $name não fez nenhum comentário no site</p>";
        }else{
            foreach($pdo->query($comment) as $key => $value){

                $text = $value['text'];
                $id_story = $value['fk_id_story'];

                $story = "SELECT * FROM story WHERE id_story = $id_story";
                foreach($pdo->query($story) as $key => $value){
                    $name = $value['nome'];
                }

                echo "<br>";
                echo "História pertencente: <a href='mod-story.php?input_1=$id_story'>$name</a><br>";
                echo "<p>Comentário: $text</p>";
            }
                    
        }
        
    ?>
</body>
</html>