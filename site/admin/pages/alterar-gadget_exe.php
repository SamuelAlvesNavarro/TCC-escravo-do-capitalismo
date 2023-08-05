<?php
    require "includes/conexao.php";
    require "includes/online.php";

    $id = $_SESSION['id'];
    $preco = $_POST['preco'];

    $gadget = "UPDATE gadget SET preco = '$preco' WHERE id_gadget = '$id'";
    $prepare = $pdo->prepare($gadget);
    $prepare->execute();

    header("Location:gadgets.php");
?>