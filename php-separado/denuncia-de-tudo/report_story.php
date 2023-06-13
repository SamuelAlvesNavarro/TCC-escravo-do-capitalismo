<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";
    $text = $_POST['text'];
    $profile = returnProfileId($email);
    $id_story = $_POST['story'];
    $code = $_POST['escolha'];

    $denucia = "INSERT INTO report_story VALUES(NULL, $id_story, $profile, $text, $code, 0)";
    $prepare = $pdo->prepare($denuncia);
    $prepare->execute();
    
?>