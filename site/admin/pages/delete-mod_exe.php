<?php
        require "includes/conexao.php";
        require "includes/online.php";

    $id = $_GET["id"];

    $sql = "DELETE FROM mods WHERE id_mod = '$id'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    header("Location: delete-mod.php");
?>