<?php 
    include "includes/conexao.php";
    include_once "includes/eventos.php";

    $story = $_POST['id_story'];

    $sql = "UPDATE story SET status = 3 WHERE id_story = '$story'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    evento(5);

    header("Location: writerHub.php");
?>