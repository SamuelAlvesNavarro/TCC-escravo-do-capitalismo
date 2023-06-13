<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";
    $text = $_POST['text'];
    $perfil = returnProfileId($email);
    $id_story = $_POST['story'];

    $denucia = "INSERT INTO report_story VALUES(NULL, )";
    $prepare = $pdo->prepare($denuncia);
    $prepare->execute();
    
?>