<?php
    $questao = $_POST['question'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $certa = $_POST['certa'];
    $perfil = 1;
    $id_story = 1;
    $pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');
    $sql = "INSERT INTO question VALUES(NULL, '$id_story','$questao')";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    $proc = "SELECT id_question FROM question WHERE fk_id_story = '$id_story'";
    foreach($pdo->query($proc) as $key => $value){
        $fk_id_question = $value['id_question'];
    }

    $sql = "INSERT INTO question_user VALUES('$fk_id_question', '$perfil')";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    
    switch($certa){
        case 'a':
            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$a', 1)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$b', 0)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$c', 0)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$d', 0)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

        break;
        case 'b':
            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$b', 1)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$a', 0)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$c', 0)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$d', 0)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();
        break;
        case 'c':
            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$c', 1)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$b', 0)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$a', 0)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$d', 0)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();
        break;
        case 'd':
            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$d', 1)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$b', 0)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$c', 0)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$a', 0)";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();
        break;
    }


    echo "<a href='responder.php'>Responda</a>";
?>