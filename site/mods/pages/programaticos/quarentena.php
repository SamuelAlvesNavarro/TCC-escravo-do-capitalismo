<?php
    require "../includes/online.php";
    require "conexao.php";

    $id_story = $_POST['id_story'];

    $quarentena = "UPDATE story SET status = 4 WHERE id_story = '$id_story'";
    $prepare = $pdo->prepare($quarentena);
    $prepare->execute();

    header("Location:../correcao.php");
?>