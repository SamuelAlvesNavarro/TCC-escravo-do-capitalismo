<?php
    require "includes/conexao.php";
    require "includes/online.php";
    include "includes/returnUser.php";

    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);

    $gadget =  $_POST['gadget'];
    if($gadget == 0 || !isset($gadget))header("Location: error.php?erro=6");

    $moedas = "SELECT * FROM gadget WHERE id_gadget = '$gadget'";
    foreach($pdo->query($moedas) as $key => $value){
        $status = $value['g_status'];
        $preco = $value['preco'];
    }
    if($status != 1)header("Location: error.php?erro=20");

    $check = "SELECT * FROM compra WHERE fk_id_gadget = '$gadget' and fk_id_profile = '$perfil'";
    $prepare = $pdo->prepare($check);
    $prepare->execute();

    $rows = $prepare->rowCount();
    if($rows != 0)header("Location: error.php?erro=9");

    $moedas = "SELECT * FROM user_common WHERE fk_id_profile = '$perfil'";
    foreach($pdo->query($moedas) as $key => $value){
        $moedas = $value['moedas'];
    }
    if($moedas < $preco){
        $_SESSION['loja'] = 1;
        header("Location:loja.php");
    } else{
        
        //compra realizada
        $compra_user = "INSERT INTO compra VALUES('$perfil', '$gadget', '".date('y-m-d')."')";
        $prepare = $pdo->prepare($compra_user);
        $prepare->execute();

        $compra = $moedas - $preco;
        $realizaCompra = "UPDATE user_common SET moedas = '$compra' WHERE fk_id_profile = '$perfil'";
        $prepare = $pdo->prepare($realizaCompra);
        $prepare->execute();

        $_SESSION['loja'] = 2;
        header("Location:loja.php");
    }
?>