<?php
    $pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');

    /* IMAGES */

    function checkimages($titulo, $id_story){
        for($x = 1; $x < 11; $x++){
            if($_FILES["imagem".$x]["size"] <= 500000 /*&& count($_FILES['imagem'.$x]['slaaaaa']) == 1*/){
                continue;
            }else break;
        }
        for($x = 1; $x < 11; $x++){
            if($_FILES["imagem".$x]["error"] == 0){
                uploadImagemCompleto($titulo, $id_story);
                break;
            }
        }
        header("Location:error.php");
    }
    function uploadImagemCompleto($titulo, $id_story){

        function images($titulo, $id_page){

            function uploadImagem($name_imagem,$pasta_destino,$nome_principal,$id_page){

                //Capturando os dados, e armazenando em variáveis locais, e variáveis de classe
                $name = $_FILES[$name_imagem];

                $nome_substituto = $nome_principal;

                $upload_arquivo = $pasta_destino.$nome_substituto;
                move_uploaded_file($name['tmp_name'], $upload_arquivo);

                //salvar endereço no banco com $id_page
                // insert into images values(NULL, $id_page, $upload_arquivo);
                
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

                    uploadImagem("imagem".$x,"../img-story/$titulo/","$titulo"."-img-".$x, $id_page);
                }
            
            }

            $titulo = gerarnomepasta($titulo, 0, $id_page);

            header("Location:criacao.php");
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

        $page = "INSERT INTO page values(NULL, '$id_story', '1', '1')";
        foreach ($pdo->query($page) as $key => $value) {
            $id_page = $value['id_page'];
        }
        $prepare = $pdo->prepare($page);
        $prepare->execute();

        if(checktitulo($titulo)){
            $titulo = tituloreplacestuff($titulo);
        } 
        
        if(checktitulo($titulo)){
            images($titulo, $id_page);
        }
    }

    /* IN ITSELF */
    
    $titulo = $_POST['titulo'];
    $historia = $_POST['story'];
    $referencia = $_POST['link-reference'];
    $perfil = 1;
    $id_story = 0;
    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
    foreach($pdo->query($sql) as $key => $value){
        $perfil = $value['fk_id_profile'];
    }

    function uploadHistoria($titulo, $historia, $pdo, $perfil){

        // inserindo story
        $story = "INSERT INTO story values(NULL, 0, '$titulo', NULL, 0, '$perfil')";
        foreach ($pdo->query($story) as $key => $value) {
            $id_story = $value['id_story'];
        }
        $prepare = $pdo->prepare($story);
        $prepare->execute();

        // func da história
        checkimages($titulo, $id_story);
        // func da ref

    }
?>