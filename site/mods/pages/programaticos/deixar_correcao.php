<?php
    require "conexao.php";

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

    $text = addslashes($text);
    $sql = "UPDATE history SET texto = '$text' WHERE id_history = '$id_history'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();
    
    $status = "UPDATE story SET status = 1 WHERE id_story = '$id_story'";
    $prepare = $pdo->prepare($status);
    $prepare->execute();


    /* QUESTÃO */

    $questao = $_POST['pergunta'];
    $questao = addslashes($questao);
    $sql = "UPDATE question SET quest_itself = '$questao' WHERE fk_id_story = $id_story";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    $sql = "SELECT * FROM question WHERE fk_id_story = '$id_story'";
    foreach($pdo->query($sql) as $key => $value){
        $id_question = $value['id_question'];
    }

    $sql = "select * from answer where fk_id_question = ".$id_question;
    $i = 1;
    foreach($pdo->query($sql) as $key => $value){
        $sql = "UPDATE answer SET text = '".$_POST['rep'.$i.'']."', status = '".$_POST['status_a_'.$i.'']."' where id_answer = ".$value['id_answer']." ";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();
        $i++;
    }

   header("Location: ../correcao.php");
?>