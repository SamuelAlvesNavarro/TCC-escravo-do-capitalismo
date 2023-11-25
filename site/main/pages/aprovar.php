<?php 
    require "includes/conexao.php";
    require "includes/online.php";
   require "includes/eventos.php";

    $story = $_POST['id_story'];

    $sql = "UPDATE story SET status = 3 WHERE id_story = '$story'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    evento(3);

    header("Location: writerHub.php");
?>