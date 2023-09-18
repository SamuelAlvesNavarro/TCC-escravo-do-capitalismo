<?php
    require "includes/conexao.php";
    require "includes/online.php";

    if(isset($_POST['rating'])){

        $id_story = $_POST['id_story'];
        $id_question = $_POST['id_question'];

        $email = $_SESSION['email'];
        $perfil = -1;
        $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
        foreach($pdo->query($sql) as $key => $value){
            $perfil = $value['fk_id_profile'];
        }

        $check = "SELECT * FROM question_user WHERE fk_id_profile = $perfil and fk_id_question = $id_question";
        $prepare = $pdo->prepare($check);
        $prepare->execute();

        if($prepare->rowCount() == 0){
            header("Location: central.php");
        }

        $check = "SELECT * FROM score WHERE fk_id_profile = $perfil and fk_id_story = $id_story";
        $prepare = $pdo->prepare($check);
        $prepare->execute();

        if($prepare->rowCount() == 0){
            
        }else{
            header("Location: central.php");
        }

        $rating = $_POST['rating'];

        if($rating > 5) $rating = 5;
        if($rating < 0) $rating = 0;

        $sql = "INSERT INTO score VALUES(NULL, $perfil, $id_story, $rating)";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        /* SET RATING */

        $i = 0;
        $ratings = "SELECT * FROM score WHERE fk_id_story = $id_story";
        foreach($pdo->query($ratings) as $key => $value){
            $totalRating += $value['nota'];
            $i++;
        }

        $rating = $totalRating/$i;

        $add = "UPDATE story SET rating = $rating WHERE id_story = $id_story";
        $prepare = $pdo->prepare($add);
        $prepare->execute();

        header("Location: story.php?story=".$id_story);

    }else{
        header("Location: central.php");
    }
?>