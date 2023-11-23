<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/enviarErro.php";
    include "includes/returnUser.php";

    $email = $_SESSION['email'];
    $id_story = $_POST['story'];
    $perfil = returnProfileId($email);

    $sql = "SELECT * FROM story where fk_id_profile = $perfil and id_story = $id_story";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();
    $pmandar = 0;
    if($prepare->rowCount() == 0){
        header("Location: index.php");
    }
    else{
        $sql = "update story set fk_id_profile = 666 where id_story = $id_story";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();
    }
?>