<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";
    $text = $_POST['text'];
    $perfil = returnProfileId($email);

    $denucia = "";
    foreach($pdo->query($denuncia) as $key => $value){

    }
    
?>