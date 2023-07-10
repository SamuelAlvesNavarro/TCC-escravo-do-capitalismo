<?php
    require "includes/online.php";
    require "includes/conexao.php";

    $id_story = $_POST['id_story'];

    $quarentena = "UPDATE story SET status = 4 WHERE story = '$id_story'";
    $prepare = $pdo->prepare($quarentena);
    $prepare->execute();

    header("Location:correcao.php");
?>