<?php
    require "includes/conexao.php";
    require "includes/online.php";

    $id_evento = $_GET['id_evento'];

    $sql = "update evento set active = 0 where id_evento = '$id_evento'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    header("Location: eventos.php");
?>