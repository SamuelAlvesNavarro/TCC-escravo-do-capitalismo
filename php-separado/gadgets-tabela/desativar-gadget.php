<?php
    require "includes/conexao.php";
    require "includes/online.php";

    $id_gadget = $_GET['id'];
    $gadget = "UPDATE gadget SET g_status = 0 WHERE id_gadget = '$id_gadget'";
    $prepare = $pdo->prepare($gadget);
    $prepare->execute();
?>