<?php
    include "includes/conexao.php"; 
    include "includes/online.php";
     
    $modo = $_POST['modo'];
    $email = $_SESSION['email'];

    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
    foreach($pdo->query($sql) as $key => $value){
        $id_profile = $value['fk_id_profile'];
    }

    function checkAllReport(){
        global $pdo;

        $sql = "delete from report_story where fk_id_reported_story = 0 and fk_id_reporter = 0";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "delete from report_comment where fk_id_reported = 0 and fk_id_reporter = 0";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "delete from report_profile where fk_id_reported = 0 and fk_id_reporter = 0";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "delete from report_profile where fk_id_reported = 0 and fk_id_reporter = 666";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();
    }

    if($id_profile == 666){
        header("Location: index.php");
        exit;
    }

    function deleteStory($id_story){
        global $pdo;

        $sql = "update report_story set fk_id_reported_story = 0 where fk_id_reported_story = $id_story";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "select * from comment where fk_id_story = $id_story";
        foreach ($pdo->query($sql) as $key => $value){
            deleteComment($value['id_comment']);
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
                    $caminho_cru = $value['path'];
                    $caminho = $value['path'];
    
                    unlink($caminho);
    
                    $del = "DELETE FROM images WHERE id_image = '$img2'";
                    $prepare = $pdo->prepare($del);
                    $prepare->execute();
    
                }
            }
    
            $caminho_parts = explode("/", $caminho_cru);
            $caminho = "../img-story/".$caminho_parts[2];
            
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

        checkAllReport();
    }
    function deleteComment($id_comment){

        global $pdo;

        $sql = "update report_comment set fk_id_reported = 0 where fk_id_reported = $id_comment";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "delete from comment where id_comment = $id_comment";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        checkAllReport();
    }

    if($modo){


        $story = "SELECT id_story FROM story WHERE fk_id_profile = $id_profile";
        foreach($pdo->query($story) as $key => $value){
            $id_story = $value['id_story']; 
            
            $passaHistory = "UPDATE story SET fk_id_profile = 666 WHERE id_story = '$id_story'";
            $prepare = $pdo->prepare($passaHistory);
            $prepare->execute();
        }

        //DELETE
        $sql = "DELETE FROM profile WHERE id_profile = $id_profile";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();        

    }else{

        $sql = "SELECT id_story FROM story WHERE fk_id_profile = $id_profile";
        foreach($pdo->query($sql) as $key => $value){
            $id_story = $value['id_story'];
            deleteStory($id_story);
        }
    }

    $sql = "update report_profile set fk_id_reported = 0 where fk_id_reported = $id_profile";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    $sql = "update report_story set fk_id_reporter = 0 where fk_id_reporter = $id_profile";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    $sql = "update report_comment set fk_id_reporter = 0 where fk_id_reporter = $id_profile";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    $sql = "update report_comment set fk_id_reported = 0 where fk_id_reported = $id_profile";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    $sql = "update report_profile set fk_id_reporter = 0 where fk_id_reporter = $id_profile";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    $sql = "delete from profile where id_profile = $id_profile";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    checkAllReport();

    session_unset();
    session_destroy();
    header("Location: acesso.html");
?>