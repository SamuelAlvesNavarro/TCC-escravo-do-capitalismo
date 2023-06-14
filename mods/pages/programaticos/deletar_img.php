<?php
    require "../includes/conexao.php";

    $img = $_POST['id_img'];
    $id_story = $_POST['id_story'];

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
        
        $del = "DELETE FROM images WHERE id_image = '$img'";
        $prepare = $pdo->prepare($del);
        $prepare->execute();

        $destroy_img = '../../../site-prototipo/pages/'.$caminho;
        unlink($destroy_img);

        $caminho_parts = explode("/", $caminho);
        unset($caminho_parts[3]);
        $caminho = implode("/", $caminho_parts);
        $caminho = '../../../site-prototipo/pages/'.$caminho;

        echo $caminho;
        
        rmdir($caminho);

    }else{

        $path = "SELECT path FROM images WHERE id_image = '$img'";
        foreach($pdo->query($path) as $key => $value){
            $caminho = $value['path'];
        }

        $caminho = '../../../site-prototipo/pages/'.$caminho;

        unlink($caminho);

        $del = "DELETE FROM images WHERE id_image = '$img'";
        $prepare = $pdo->prepare($del);
        $prepare->execute();
    }

    header("Location:../corrigir.php?story=".$id_story);
?>