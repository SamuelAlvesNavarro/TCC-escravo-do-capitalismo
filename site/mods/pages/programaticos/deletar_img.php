<?php
    require "conexao.php";

    $img = $_POST['id_img'];
    $id_story = $_POST['id_story'];
    $text = $_POST['story'];
    $title = $_POST['nome'];

    

    $page = "SELECT id_page from page where fk_id_story = $id_story and type = 1";
    foreach ($pdo->query($page) as $key => $value){
        $id_page = $value['id_page'];
    }

    $count = "SELECT COUNT(*) as numb FROM images WHERE fk_id_page = '$id_page'";
    foreach ($pdo->query($count) as $key => $value){
        $num = $value['numb'];
    }

    if($num == 1){
        
        $path = "SELECT path FROM images WHERE id_image = '$img'";
        foreach($pdo->query($path) as $key => $value){
            $caminho = $value['path'];
        } 
        
        $delImg = "DELETE FROM images WHERE id_image = '$img'";
        $prepare = $pdo->prepare($delImg);
        $prepare->execute();

        $delPage = "DELETE FROM page WHERE id_page = '$id_page' and type = 1";
        $prepare = $pdo->prepare($delPage);
        $prepare->execute();

        $caminho = substr($caminho, 3);

        $destroy_img = '../../../main/'.$caminho;
        unlink($destroy_img);

        $caminho_parts = explode("/", $caminho);
        $caminho = $caminho_parts[1];
        $caminho = '../../../main/img-story/'.$caminho;
        
        rmdir($caminho);

    }else{

        $path = "SELECT path FROM images WHERE id_image = '$img'";
        foreach($pdo->query($path) as $key => $value){
            $caminho = $value['path'];
        }

        $caminho = substr($caminho, 3);

        $caminho = '../../../main/'.$caminho;

        unlink($caminho);

        $del = "DELETE FROM images WHERE id_image = '$img'";
        $prepare = $pdo->prepare($del);
        $prepare->execute();
    }

    if(!isset($fundo)){
        $fundo = 0;
    }

    function saveStory($text, $title, $id_story, $st){

        global $pdo, $fundo;
        
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
        
        $status = "UPDATE story SET status = $st WHERE id_story = '$id_story'";
        $prepare = $pdo->prepare($status);
        $prepare->execute();

        /* FUNDO */

        $page = "SELECT id_page from page where fk_id_story = $id_story and type = 1";
        foreach ($pdo->query($page) as $key => $value){
            $id_page = $value['id_page'];
        }

        $sql = "UPDATE images SET fundo = 0 WHERE fk_id_page = $id_page";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "UPDATE images SET fundo = 1 WHERE id_image = $fundo";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        /* QUESTÃO */

        $questao = $_POST['pergunta'];
        $sql = "UPDATE question SET quest_itself = '$questao' WHERE fk_id_story = $id_story";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "SELECT * FROM question WHERE fk_id_story = '$id_story'";
        foreach($pdo->query($sql) as $key => $value){
            $id_question = $value['id_question'];
        }

        $r = $_POST['status_a'];
        $sql = "select * from answer where fk_id_question = ".$id_question;
        $i = 1;
        foreach($pdo->query($sql) as $key => $value){
            $sql = "UPDATE answer SET text = '".$_POST['rep'.$i.'']."', status = '0' where id_answer = ".$value['id_answer']." ";

            if($i == $r){
                $sql = "UPDATE answer SET text = '".$_POST['rep'.$i.'']."', status = '1' where id_answer = ".$value['id_answer']." ";
            }
            
            $prepare = $pdo->prepare($sql);
            $prepare->execute();
            $i++;
        }
        
    }
    
    saveStory($text, $title, $id_story, 1);

    header("Location:../corrigir.php?story=".$id_story);
?>