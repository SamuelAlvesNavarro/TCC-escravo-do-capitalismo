<?php

    require "includes/conexao.php";
    require "includes/online.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_SESSION['email'];
        $perfil = -1;
        $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
        foreach($pdo->query($sql) as $key => $value){
            $perfil = $value['fk_id_profile'];
        }

        $id_story = $_POST['id_story'];
        $id_question = $_POST['id_question'];

        $check = "SELECT * FROM question_user WHERE fk_id_profile = $perfil and fk_id_question = $id_question";
        $prepare = $pdo->prepare($check);
        $prepare->execute();

        if($prepare->rowCount() == 0){
            $resp = $_POST['number'];
            $leitor = "SELECT * FROM user_common WHERE fk_id_profile = '$perfil'";
                foreach($pdo->query($leitor) as $key => $value){
                    $pontos_leitor = $value['pontos_leitor'];
                    $moedas = $value['moedas'];
                }
            if($resp == 1){
                $pontos_leitor += 100;
                $moedas += 20;

                /* PONTOS DE LEITOR */
                $add = "UPDATE user_common SET pontos_leitor = '$pontos_leitor' WHERE fk_id_profile = '$perfil'";
                $prepare = $pdo->prepare($add);
                $prepare->execute();

                /* MOEDAS */
                $add = "UPDATE user_common SET moedas = '$moedas' WHERE fk_id_profile = '$perfil'";
                $prepare = $pdo->prepare($add);
                $prepare->execute();

                $question_user = "INSERT INTO question_user VALUES('$id_question', '$perfil')";
                $prepare = $pdo->prepare($question_user);
                $prepare->execute();

                header("Location: story.php?input_1=".$id_story);
            }
        }else{
            header("Location: error.php");
        }
    }else{
        header("Location: error.php");
    }
?>