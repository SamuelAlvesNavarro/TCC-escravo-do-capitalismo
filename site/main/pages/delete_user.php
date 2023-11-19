<?php
    include "includes/online.php";
    include "includes/conexao.php";
    include "includes/returnUser.php";
    
    
    $modo = $_POST['modo'];
    $id_profile = returnProfileId($_SESSION['email']);

    if($id_profile == 666){
        header("Location: index.php");
        exit;
    }

    if($modo){


        $story = "SELECT id_story FROM story WHERE fk_id_profile = $id_profile";
        foreach($pdo->query($story) as $key => $value){
            $id_story = $value['id_story'];
        }

        // PASSA HISTORITO
        $passaHistory = "UPDATE story SET fk_id_profile = 666 WHERE id_story = '$id_story'";
        $prepare = $pdo->prepare($passaHistory);
        $prepare->execute();

        //DELETE
        $sql = "DELETE FROM profile WHERE id_profile = $id_profile";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();        

    }else{

        $sql = "SELECT id_story FROM story WHERE fk_id_profile = $id_profile";
        foreach($pdo->query($sql) as $key => $value){
            $id_story = $value['id_story'];
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
            foreach ($pdo->query($image) as $key => $value){
                $img[$key] = $value['id_image'];
            }
    
            //APAGANDO CADA DAS IMAGENS POR VEZ
                for($i = 0; $i < $num; $i++){            
                    $img = $img[$i];
    
                    if($num == 1){
                        
                        $path = "SELECT path FROM images WHERE id_image = '$img'";
                        foreach($pdo->query($path) as $key => $value){
                            $caminho = $value['path'];
    
                            $delImg = "DELETE FROM images WHERE id_image = '$img'";
                            $prepare = $pdo->prepare($delImg);
                            $prepare->execute();
    
                            $delPage = "DELETE FROM page WHERE id_page = '$id_page' and type = 1";
                            $prepare = $pdo->prepare($delPage);
                            $prepare->execute();
    
                            $destroy_img = $caminho;
                            unlink($destroy_img);
    
                            $caminho_parts = explode("/", $caminho);
                            unset($caminho_parts[3]);
                            $caminhos_parts = array($caminho_parts[0], $caminho_parts[1], $caminho_parts[2]);
                            $caminho = implode("/", $caminhos_parts);

                            rmdir($caminho);
    
                        } 
    
                    }else{
    
                        $path = "SELECT path FROM images WHERE id_image = '$img'";
                        foreach($pdo->query($path) as $key => $value){
                            $caminho = $value['path'];
    
                            $caminho = '../../main/pages/'.$caminho;
    
                            unlink($caminho);
    
                            $del = "DELETE FROM images WHERE id_image = '$img'";
                            $prepare = $pdo->prepare($del);
                            $prepare->execute();
    
                        }
                    }
            }
        }
        $id_page = returnIdPage($id_story);
        $images = "SELECT * FROM images WHERE fk_id_page = '$id_page'";
        $count = "SELECT COUNT(*) as numb FROM images WHERE fk_id_page = '$id_page'";
        foreach ($pdo->query($count) as $key => $value){
            $num = $value['numb'];
        }

        for($i = 0; $i < $num; $i++){
            delImage($id_story);
        }

        $sql = "DELETE FROM profile WHERE id_profile = $id_profile";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();
    }

    require "includes/closing_session.php";
    header("Location:acesso.html");
?>