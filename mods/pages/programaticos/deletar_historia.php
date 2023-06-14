<?php
    require "../includes/conexao.php";
    global $pdo;

    $id_story = $_POST['id_story'];

    function delHistory($id_story, $pdo){

        // Coletando id_page
        $sql = "SELECT * FROM page WHERE fk_id_story = '$id_story' and type = 0";
        foreach($pdo->query($sql) as $key => $value){
            $id_page = $value['id_page'];
        }
        // Coletando id_page

    }
    function delImage($id_story, $pdo){

        // Coletando id_page
        $sql = "SELECT * FROM page WHERE fk_id_story = '$id_story' and type = 1";
        foreach($pdo->query($sql) as $key => $value){
            $id_page = $value['id_page'];
        }
        // Coletando id_page

        // CONTANDO QUANTAS IMAGENS DA HISTÓRIA RESTAM
        $count = "SELECT COUNT(*) as numb FROM images WHERE fk_id_page = '$id_page'";
        foreach ($pdo->query($count) as $key => $value){
            $num = $value['numb'];
        }

        // COLETANDO ID_IMAGE EM FORMA DE ARRAY
        $image = "SELECT * FROM images WHERE fk_id_page = '$id_page'";
        foreach ($pdo->query($image) as $key => $value){
            $img[$key] = $value['id_image'];
        }

        //APAGANDO CADA UMA IMAGEM POR VEZ
            for($i = 0; $i < $num; $i++){            
                $img = $img[$i];

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
        }
    }
    function delReference($id_story, $pdo){
    
        // Coletando id_page
        $sql = "SELECT * FROM page WHERE fk_id_story = '$id_story' and type = 2";
        foreach($pdo->query($sql) as $key => $value){
            $id_page = $value['id_page'];
        }
        // Coletando id_page
    }

?>