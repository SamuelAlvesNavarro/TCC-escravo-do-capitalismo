<?php

    require "includes/conexao.php";
    require "includes/online.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $email = $_SESSION['email'];
        $perfil = -1;
        $sql = "SELECT * FROM user_common WHERE email = '$email'";
        foreach($pdo->query($sql) as $key => $value){
            $perfil = $value['fk_id_profile'];
            $pontos_leitor = $value['pontos_leitor'];
            $moedas = $value['moedas'];
        }

        $id_story = $_POST['id_story'];
        $id_question = $_POST['id_question'];

        $check = "SELECT * FROM error_user WHERE fk_id_profile = $perfil and fk_id_story = $id_story";
        $prepare = $pdo->prepare($check);
        $prepare->execute();

        if($prepare->rowCount() == 0){

            $question_user = "INSERT INTO error_user VALUES(NULL, $perfil, $id_story)";
            $prepare = $pdo->prepare($question_user);
            $prepare->execute();

        }

        $moedas += -50;
        $add = "UPDATE user_common SET moedas = $moedas WHERE fk_id_profile = $perfil";
        $prepare = $pdo->prepare($add);
        $prepare->execute();

        header("Location: story.php?input_1=".$id_story);

    }else{
        header("Location: error.php");
    }

?>