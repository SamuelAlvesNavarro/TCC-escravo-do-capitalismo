<?php

    require 'includes/conexao.php';
    require 'includes/returnUser.php';

    $gadget = $_POST['gadget'];

    $sql = "SELECT * FROM gadget WHERE id_gadget = '$gadget'";
    foreach($pdo->query($sql) as $key => $value){
        $type = $value['type'];
        $visual = $value['in_it'];
    }
    
    if($type == 0){
        $user = "UPDATE profile SET foto = '$visual' WHERE = fk_id_perfil = '$perfil'";
    } else if($type == 1){
        $user = "UPDATE profile SET fundoPerfil = '$visual' WHERE = fk_id_perfil = '$perfil'";
    } else if($type == 2){
        $user = "UPDATE profile SET bordaFoto = '$visual' WHERE = fk_id_perfil = '$perfil'";
    } else if($type == 3){
        $user = "UPDATE profile SET fundoFoto = '$visual' WHERE = fk_id_perfil = '$perfil'";
    }

    
?>