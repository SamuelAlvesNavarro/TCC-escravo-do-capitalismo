<?php
    include "includes/conexao.php";
    include "includes/online.php";

    $id_comment = $_GET['id_comment'];

    $sql = "DELETE FROM comment WHERE id_comment = $id_comment";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    header("Location:user_comment.php");
?>