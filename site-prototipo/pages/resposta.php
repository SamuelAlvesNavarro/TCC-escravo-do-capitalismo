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
        $resp = $_POST['number'];

        
        $sql = "SELECT * from answer where fk_id_question = $id_question and status=1";
        foreach($pdo->query($sql) as $key => $value){
            $rig = $value['text'];
        }

        if($resp == $rig){

            if($moedas < 0){
                $check = "SELECT * FROM question_user WHERE fk_id_profile = $perfil and fk_id_question = $id_question";
                $prepare = $pdo->prepare($check);
                $prepare->execute();

                if($prepare->rowCount() == 0){

                    $pontos_leitor += 0;
                    $moedas += 25;

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

                    $_SESSION['story'] = 1;
                    header("Location: story.php?input_1=".$id_story);
                }else{
                    header("Location: error.php?erro=11"); //erro -> já respondeu a questão e tentou chamar a página de acerto para farmar pontos
                }
            }else{
                $check = "SELECT * FROM question_user WHERE fk_id_profile = $perfil and fk_id_question = $id_question";
                $prepare = $pdo->prepare($check);
                $prepare->execute();

                if($prepare->rowCount() == 0){

                    $pontos_leitor += 100;
                    $moedas += 25;

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

                    $_SESSION['story'] = 1;
                    header("Location: story.php?input_1=".$id_story);
                }else{
                    header("Location: error.php?erro=11"); //erro -> já respondeu a questão e tentou chamar a página de acerto para farmar pontos
                }
            }

        }else{

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

            $_SESSION['story'] = 0;
            header("Location: story.php?input_1=".$id_story);
        }

    }else{
        header("Location: error.php?erro=12");
    }
?>