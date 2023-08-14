<?php
    require "../includes/conexao.php";
    require "../includes/online.php";

    $profile = $_GET['id_report'];
    $story = $_GET['id_report'];
    $comment = $_GET['id_report'];

    if(!isset($profile)){
        $sql = "UPDATE report_profile SET code = 2 WHERE id_report = $profile";
    }

    if(!isset($story)){
        $sql = "UPDATE report_story SET code = 2 WHERE id_report = $story";
    }

    if(!isset($comment)){
        $sql = "UPDATE report_comment SET code = 2 WHERE id_report = $comment";
    }
    
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    header("Location: ../report_center.php");

?>