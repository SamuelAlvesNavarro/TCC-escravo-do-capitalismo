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

    $ar = 0;
    $br = 0;
    $cr = 0;
    $dr = 0;

    if($certa == 'a') $ar = 1;
    if($certa == 'b') $br = 1;
    if($certa == 'c') $cr = 1;
    if($certa == 'd') $dr = 1;
        
    $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$a', $ar)";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$b', $br)";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$c', $cr)";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$d', $dr)";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();


    echo "<a href='responder.php'>Responda</a>";
?>