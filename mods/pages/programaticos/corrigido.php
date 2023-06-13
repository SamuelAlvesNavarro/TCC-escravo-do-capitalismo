<?php
    require "../includes/conexao.php";

    $text = $_POST['story'];
    $title = $_POST['nome'];
    $id_story = $_POST['id_story'];

    $sql = "UPDATE story SET nome = '$title' WHERE id_story = '$id_story'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();


    $page = "SELECT id_page from page where fk_id_story = $id_story and type = 0";
    foreach ($pdo->query($page) as $key => $value){
        $id_page = $value['id_page'];
    }

    $sql = "SELECT * FROM history WHERE fk_id_page = '$id_page'";
    foreach($pdo->query($sql) as $key => $value){
        $id_history = $value['id_history'];
    }

    $sql = "UPDATE history SET texto = '$text' WHERE id_history = '$id_history'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();
    
    $status = "UPDATE story SET status = 2 WHERE id_story = '$id_story'";
    $prepare = $pdo->prepare($status);
    $prepare->execute();

    header("Location: ../correcao.php");
?>