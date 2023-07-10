<?php 
    include "../includes/conexao.php";

    $story = $_POST['id_story'];

    $sql = "UPDATE story SET status = 5 WHERE id_story = '$story'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    header("Location: ../corrigir.php?story=".$story);
?>