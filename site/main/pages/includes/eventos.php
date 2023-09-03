<?php

    require 'conexao.php';
    require 'online.php';
    require 'returnUser.php';

    $codEvento = $_POST['evento'];

    /*$email = $_SESSION['email'];
    $perfil = returnProfileId($email);*/

function darMoedas($moedas){
    global $pdo;

    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);

    $user = "SELECT * FROM user_common WHERE fk_id_profile = '$perfil'";
    foreach($pdo->query($user) as $key => $value){
        $moedasUser = $value['moedas'];
    }

    $novasMoedas = $moedasUser + $moedas;

    $addMoedas = "UPDATE user_common SET moedas = '$novasMoedas' WHERE fk_id_profile = '$perfil'";
    $prepare = $pdo->prepare($addMoedas);
    $prepare->execute();
}

function darGadget($id_gadget){
    global $pdo;

    /*$sql = "SELECT * FROM eventos WHERE id_evento = '$codEvento'";
    foreach($pdo->query($sql) as $key => $value){
        $id_gadget = $value['id_gadget'];
    }*/


    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);

    $checkCompra = "SELECT * FROM compra WHERE fk_id_profile = '$perfil' AND fk_id_gadget = '$id_gadget'";
    $prepare = $pdo->prepare($checkCompra);
    $prepare->execute();
    
    if($prepare->rowCount() > 0){
        exit;
    }else{
        $user_gadget = "INSERT INTO compra VALUES('$perfil', '$id_gadget', '".date('y-m-d')."')";
        $prepare = $pdo->prepare($user_gadget);
        $prepare->execute();
    }

}

function evento($codEvento){
    global $pdo;

    $sql = "SELECT * FROM eventos WHERE id_evento = '$codEvento'";
    foreach($pdo->query($sql) as $key => $value){
        $execute = $value['comando'];
    }

    eval($execute);
}

?>