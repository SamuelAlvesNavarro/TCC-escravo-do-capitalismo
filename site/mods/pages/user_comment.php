<?php
    include "includes/conexao.php";
    include "includes/online.php";

    $perfil = $_POST['id_profile'];

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
</head>
<body>

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