<?php

        require "includes/conexao.php";
        require "includes/online.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM evento WHERE id_evento = '$id'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    header("Location: eventos.php");

?>