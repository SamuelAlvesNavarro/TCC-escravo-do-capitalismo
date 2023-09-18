<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";
    require "includes/enviarErro.php";
    require "includes/checarTexto.php";

    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);
    $comment = $_POST['comment-text'];
    $id_story = $_SESSION['id_story'];


    if($id_story != 0 && $comment != ""){

        if(!verificarTexto($comment, 0)){
            sendToError(8);
            exit;
        }

        $comment = "INSERT INTO comment VALUES(NULL, '$id_story', '$perfil', '$comment')";
        $prepare = $pdo->prepare($comment);
        $prepare->execute();

        $_SESSION['id_story'] = 0;
        header("Location: story.php?story=$id_story");

    }else{
        sendToError(8);
        exit;
    }
?>