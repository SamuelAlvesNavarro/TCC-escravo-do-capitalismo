<?php

    $id_story = 1;
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
    echo "<input type='submit' value='Enviar'><br>";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $resp = $_POST['resp'];
        if($resp == 1){
            echo "Parabens você acertou!";
        }else{
            echo "Que pena, você errou!";
        }
    }
?>
