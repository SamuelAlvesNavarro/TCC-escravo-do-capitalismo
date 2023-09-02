<?php

    require 'conexao.php';
    require 'online.php';
    require 'returnUser.php';

    $codEvento = $_POST['evento'];
    $email = $_SESSION['email'];

function darMoedas($codEvento, $email){
    global $pdo;

    $sql = "SELECT * FROM eventos WHERE id_evento = '$codEvento'";
    foreach($pdo->query($sql) as $key => $value){
        $moedas = $value['moedas'];
    }

    $perfil = returnProfileId($email);

    $user = "SELECT * FROM ";
}

function darGadget(){
    global $pdo;

}

function evento(){
    global $pdo;

}

?>