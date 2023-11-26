<?php


    require "conexao.php";

    $id_story = $_POST['id_story'];


    function returnIdPage($id_story){
        global $pdo;
        // Coletando id_page
        $sql = "SELECT * FROM page WHERE fk_id_story = '$id_story' and type = 1";
        foreach($pdo->query($sql) as $key => $value){
            $id_page = $value['id_page'];
            return $id_page;
        }
        // Coletando id_page
    }

    function delImage($id_story){
        global $pdo;

        $id_page = returnIdPage($id_story);
        // CONTANDO QUANTAS IMAGENS DA HISTÓRIA RESTAM
        $count = "SELECT COUNT(*) as numb FROM images WHERE fk_id_page = '$id_page'";
        foreach ($pdo->query($count) as $key => $value){
            $num = $value['numb'];
        }

        // COLETANDO ID_IMAGE EM FORMA DE ARRAY
        $image = "SELECT * FROM images WHERE fk_id_page = '$id_page'";
        $img = array();
        foreach ($pdo->query($image) as $key => $value){
            array_push($img, $value['id_image']);
        }

        //APAGANDO CADA DAS IMAGENS POR VEZ
        for($i = 0; $i < $num; $i++){            
            $img2 = $img[$i];

            $path = "SELECT path FROM images WHERE id_image = '$img2'";
            foreach($pdo->query($path) as $key => $value){
                $caminho_cru = $value['path'];
                $caminho = "../../../main/pages/".$value['path'];

                unlink($caminho);

                $del = "DELETE FROM images WHERE id_image = '$img2'";
                $prepare = $pdo->prepare($del);
                $prepare->execute();

            }
        }

        $caminho_parts = explode("/", $caminho_cru);
        $caminho = "../../../main/img-story/".$caminho_parts[2];
        
        rmdir($caminho);
    }

    $id_page = returnIdPage($id_story);
    $images = "SELECT * FROM images WHERE fk_id_page = '$id_page'";
    $count = "SELECT COUNT(*) as numb FROM images WHERE fk_id_page = '$id_page'";
    foreach ($pdo->query($count) as $key => $value){
        $num = $value['numb'];
    }

    for($i = 0; $i < $num; $i++){
        delImage($id_story);
        break;
    }

    $delStory = "DELETE FROM story WHERE id_story = '$id_story'";
    $prepare = $pdo->prepare($delStory);
    $prepare->execute();

    header("Location:../correcao.php");

?>