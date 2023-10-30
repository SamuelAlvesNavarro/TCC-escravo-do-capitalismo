<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";

    $text = $_POST['text'];
    $reportando = returnProfileId($email);
    $reportado = $_POST['profile'];
    $id_comment = $_POST['id_comment'];

    $denucia = "INSERT INTO report_comment VALUES(NULL, $reportado, $reportando, $id_comment, $text, 0)";
    $prepare = $pdo->prepare($denuncia);
    $prepare->execute();
?>