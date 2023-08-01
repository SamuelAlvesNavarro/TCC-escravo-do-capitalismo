<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";

    $email = $_SESSION['email'];
    $perfil = returnIdPage($email);
    $coment = $_POST['coment'];
    $id_story = $_POST['id_story'];


    $comment = "INSERT INTO comment VALUES(NULL, '$id_story', '$perfil', '$coment')";
    $prepare = $pdo->prepare($comment);
    $prepare->execute();

    header("Location: story.php");

?>