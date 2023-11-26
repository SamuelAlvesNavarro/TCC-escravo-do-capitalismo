<?php
    require "includes/returnUser.php";
    require "includes/online.php";
    
    $perfil = -1;
    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);
    if($perfil == -1 || !isset($perfil)){
        header("Location: acesso.html");  
        exit;
    }

    $id_story = $_POST['story'];

    $sql = "select fk_id_profile from story where id_story = ".$_POST['story'];
    foreach($pdo->query($sql) as $key => $value){
        $id = $value['fk_id_profile'];
    }

    if($id != $perfil){
        header("Location: central.php");
        exit;
    }

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
                $caminho = $value['path'];

                unlink($caminho);

                $del = "DELETE FROM images WHERE id_image = '$img2'";
                $prepare = $pdo->prepare($del);
                $prepare->execute();

            }
        }

        $caminho_parts = explode("/", $caminho);
        unset($caminho_parts[3]);
        $caminhos_parts = array($caminho_parts[0], $caminho_parts[1], $caminho_parts[2]);
        $caminho = implode("/", $caminhos_parts);
        
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

    header("Location: writerHub.php");

?>