<?php
    require "includes/conexao.php";
    require "includes/returnUser.php";

    $gadget =  $_POST['gadget'];

    $moedas = "SELECT * FROM user_common WHERE fk_id_profile = '$perfil'";
    foreach($pdo->query($moedas) as $key => $value){
        $moedas = $value['moedas'];
    }
    if($moedas < $preco){
        $_SESSION['loja'] = 1;
        header("Location:loja.php");
    } else{
        
        //compra realizada
        $compra_user = "INSERT INTO compra VALUES('$perfil', '$gadget')";
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