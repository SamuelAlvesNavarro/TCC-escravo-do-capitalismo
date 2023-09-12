<?php
    require "includes/online.php";
    require 'includes/returnUser.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $perfil = returnProfileId($_SESSION['email']);
        $gadget = $_POST['gadget'];

        $sql = "SELECT * FROM gadget WHERE id_gadget = '$gadget'";
        foreach($pdo->query($sql) as $key => $value){
            $type = $value['type'];
            $visual = $value['in_it'];
        }
        
        $check = "SELECT * FROM compra WHERE fk_id_gadget = '$gadget' and fk_id_profile = '$perfil'";
        $prepare = $pdo->prepare($check);
        $prepare->execute();

        if($prepare->rowCount() != 1) header("Location: error.php?erro=1000");

        if($type == 0){
            $user = "UPDATE profile SET foto = '$gadget' WHERE id_profile = '$perfil'";
        } else if($type == 1){
            $user = "UPDATE profile SET fundoFoto = '$gadget' WHERE id_profile = '$perfil'";
        } else if($type == 2){
            $user = "UPDATE profile SET bordaFoto = '$gadget' WHERE id_profile = '$perfil'";
        } else if($type == 3){
            $user = "UPDATE profile SET fundoPerfil = '$gadget' WHERE id_profile = '$perfil'";
        }

        $prepare = $pdo->prepare($user);
        $prepare->execute();
        
        header("Location: profile.php?profile=".$perfil);

    }else{
        header("Location: error.php?error=199");
    }
?>