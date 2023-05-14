<?php

    $id_story = 1;
    $perfil = 1;
    $pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');

    echo "<form method='POST' action='responder.php'>";
    $question = "SELECT * FROM question WHERE fk_id_story = '$id_story'";
    foreach($pdo->query($question) as $key => $value){
        echo "<div class=''>". $value['quest_itself'] ."</div>";
        $id_question = $value['id_question'];
    }
    
    $answer = "SELECT * FROM answer WHERE fk_id_question = '$id_question'";
    $number=0;
    foreach($pdo->query($answer) as $key => $value){
        $number++;
        echo "<input type='radio' name='resp' id='resp' value='". $value['status'] ."'>$number) ". $value['text'] . "<br>";
    }
    echo "<input type='submit' value='Enviar' onclick='resultado(". $value['status'] .")'><br>";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $check = "SELECT * FROM question_user WHERE fk_id_profile = '$perfil'";
        $prepare = $pdo->prepare($check);
        $prepare->execute();

        if($prepare->rowCount() == 0){
            $resp = $_POST['resp'];
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

            }else{
                echo "Que pena, você errou!";
                $moedas += -50;
                $add = "UPDATE user_common SET moedas = '$moedas' WHERE fk_id_profile = '$perfil'";
                $prepare = $pdo->prepare($add);
                $prepare->execute();
            }
        }else{
            echo "Já respondeu, kkkkkk capa";
        }
    }
?>
