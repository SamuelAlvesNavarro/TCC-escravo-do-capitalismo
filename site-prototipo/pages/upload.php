<?php
    require "includes/conexao.php";
    $historia = $_POST['story'];

    /* CREATE STORY */

    function uploadHistoria($titulo, $pdo, $perfil){
        $id_story = -1;
        $story = "INSERT INTO story values(NULL, 0, '$titulo', 0, 1, '$perfil')";
        $prepare = $pdo->prepare($story);
        $prepare->execute();
        $story2 = "SELECT id_story FROM story WHERE fk_id_profile = '$perfil' and nome = '$titulo'";
        foreach ($pdo->query($story2) as $key => $value) {
            $id_story = $value['id_story'];
        }
        if($id_story != -1){
            return $id_story;
        }else{
            return -1;
        }
    }

    /* PAGES */

    function Createpage($pdo, $id_story, $type){
        $page = "INSERT INTO page values(NULL, $id_story, $type, $type)";
        $prepare = $pdo->prepare($page);
        $prepare->execute();
    }
    function RetornarIdPage($pdo, $id_story, $type){
        $page = "SELECT id_page from page where fk_id_story = $id_story and type = $type";
        foreach ($pdo->query($page) as $key => $value) {
            $id_page = $value['id_page'];
            return $id_page;

        }
    }

    /* IMAGES */

    function checkimages($titulo, $id_story, $pdo){
        $error = 0;
        for($x = 1; $x < 11; $x++){
            if($_FILES["imagem".$x]["size"] <= 500000 /*&& count($_FILES['imagem'.$x]['slaaaaa']) == 1*/){
                continue;
            }else{
                $error++;
                break;
            }
        }
        for($x = 1; $x < 11; $x++){
            if($_FILES["imagem".$x]["error"] == 0){
                uploadImagemCompleto($titulo, $id_story, $pdo);
            }else{
                $error++;
                break;
            }
        }
        if($error != 0) header("Location: error.php");
    }
    function uploadImagemCompleto($titulo, $id_story, $pdo){

        function images($titulo, $id_page){

            function uploadImagem($name_imagem,$pasta_destino,$nome_principal,$id_page){

                $pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');

                $name = $_FILES[$name_imagem];

                $upload_arquivo = $pasta_destino.$nome_principal;
                move_uploaded_file($name['tmp_name'], $upload_arquivo);
                $page = "INSERT INTO images values(NULL, $id_page, '$upload_arquivo')";
                $prepare = $pdo->prepare($page);
                $prepare->execute();
            }

            function gerarnomepasta($titulo, $num, $id_page){
                if(is_dir("../img-story/$titulo")){
                    if($num == 0) $titulo .= '(0)';

                    $nump = $num + 1;
                    $titulo = str_replace("($num)", "($nump)", $titulo);

                    gerarnomepasta($titulo, $nump, $id_page);
                }else{
                    mkdir('../img-story/' . $titulo, 0777, false);
                    callupload($titulo, $id_page);
                }
            }

            function callupload($titulo, $id_page){

                for($x = 1; $x < 11; $x++){
                    if($_FILES["imagem".$x]["error"] == 0){
                        uploadImagem("imagem".$x,"../img-story/$titulo/","$titulo"."-img-".$x, $id_page);
                    }
                }
            
            }

            $titulo = gerarnomepasta($titulo, 0, $id_page);
        }

        function checktitulo($titulo){ 
            if($titulo == "cu"){
                header("Location:error.php");
                return false;
            } 
            return true;
        }
        function tituloreplacestuff($titulo){
            preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", '/[!@#$%^&*(),.?":{}|<>\s]/'),explode(" ","a A e E i I o O u U n N"),$titulo);
            return $titulo;
        }

        /* EM SI */

        $id_page = -1;

        Createpage($pdo, $id_story, 1);
        $id_page = RetornarIdPage($pdo, $id_story, 1);

        echo $id_page;

        if(checktitulo($titulo)){
            $titulo = tituloreplacestuff($titulo);
        } 
        
        if(checktitulo($titulo)){
            if($id_page != -1){
                images($titulo, $id_page);
            }
        }
    }


    /* IN ITSELF */
    
    $titulo = $_POST['titulo'];
    $referencia = $_POST['link-reference'];
    $email = 'samu@gmail.com';
    $perfil = -1;
    $id_story = 0;
    $historia = $_POST['story'];
    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
    foreach($pdo->query($sql) as $key => $value){
        $perfil = $value['fk_id_profile'];
    }

    if($perfil == -1)header("Location: error.php");
    // coletando id_story e criando Historia
    $id_story = uploadHistoria($titulo, $pdo, $perfil);

    $id_page = RetornarIdPage($pdo, $id_story, 1);
    echo $id_page;

    if($id_story != -1){
        // func da história
        //history($id_page, $historia, $pdo);
        // func da img
        checkimages($titulo, $id_story, $pdo);
        // func da ref
        referencia($id_page, $referencia, $pdo);
    }

    function history($id_page, $historia, $pdo){

        $history = "INSERT INTO history values(NULL, '$id_page', '$historia')";
        $prepare = $pdo->prepare($history);
        $prepare->execute();
    }

    function referencia($id_page, $referencia, $pdo){

        $reference = "INSERT INTO reference values(NULL, '$id_page', '$referencia')";
        $prepare = $pdo->prepare($reference);
        $prepare->execute();
    }

?>