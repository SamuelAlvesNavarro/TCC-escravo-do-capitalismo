<?php
    require "../includes/conexao.php";

    $id_story = $_POST['id_story'];

    $status = "UPDATE story SET status = 1 WHERE id_story = '$id_story'";
    $prepare = $pdo->prepare($status);
    $prepare->execute();

    header("Location: ../correcao.php");
?>