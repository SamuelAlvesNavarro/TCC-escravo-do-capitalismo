<?php
    require "includes/conexao.php";
    require "includes/online.php";

    $titulo = $_POST['titulo'];
    $type = $_POST['type'];
    $desc = $_POST['desc'];
    $func = $_POST['funcao'];
    $num = $_POST['num'];

    if($func == 1){
        $script = 'darMoedas('.$num.')';
    }else{
        $script = 'darGadget('.$num.')';
    }

    $evento = "INSERT INTO evento values(NULL, '$titulo', '$desc', '$type', '$script', 0)";
    $prepare = $pdo->prepare($evento);
    $prepare->execute();

?>