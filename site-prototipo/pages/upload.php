<?php
    require 'includes/conexao.php';
    require 'includes/online.php';
    global $pdo;

    $email = $_SESSION['email'];

    $array = explode("\n", $_POST['story']);

    /*for($i = 0; $i < sizeof($array); $i++){
        $array[$i] = $array[$i]."<br>";
    }*/

    $historia = array_unique($array);
    $historia = implode("",$array);
    $remove = array("*1 ", " /*1", "*2 ", " /*2", "*3 ", " /*3", "*4 ", " /*4", "*5 ", " /*5", "*6 ", " /*6", "** ", " /**", "*-* ", " /*-*");
    $add = array("<h1>", "</h1>", "<h2>", "</h2>", "<h3>", "</h3>", "<h4>", "</h4>", "<h5>", "</h5>", "<h6>", "</h6>", "<strong>", "</strong>", "<u>", "</u>");
    $historia = str_replace($remove, $add, $historia);
    echo $historia;

    /* CREATE STORY */

    function uploadHistoria($titulo, $perfil){
        global $pdo;
        $id_story = -1;
        $story = "INSERT INTO story values(NULL, 0, '$titulo', 0, 1, '$perfil')";
        $prepare = $pdo->prepare($story);
        $prepare->execute();

        $story2 = "select max(id_story) from story where fk_id_profile = '$perfil' and nome = '$titulo'";
        foreach ($pdo->query($story2) as $key => $value){
            $id_story = $value['max(id_story)'];
        }
        return $id_story;
    }

    /* PAGES */

    function Createpage($id_story, $type){
        global $pdo;
        $page = "INSERT INTO page values(NULL, $id_story, $type, $type)";
        $prepare = $pdo->prepare($page);
        $prepare->execute();
    }
    function RetornarIdPage($id_story, $type){
        global $pdo;
        $page = "SELECT id_page from page where fk_id_story = $id_story and type = $type";
        foreach ($pdo->query($page) as $key => $value) {
            $id_page = $value['id_page'];
            return $id_page;

        }
    }
    
    /* HISTORY */

    function history($historia, $id_story){
        global $pdo;
        Createpage($id_story, 0);
        $id_page = RetornarIdPage($id_story, 0);
        $history = "INSERT INTO history values(NULL, '$id_page', '".$historia."')";
        $prepare = $pdo->prepare($history);
        $prepare->execute();
    }

    /* IMAGES */

    function checkimagesBef(){
        for($x = 1; $x < 11; $x++){
            $extensao = pathinfo($_FILES['imagem'.$x]['name'], PATHINFO_EXTENSION);
            if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' && $extensao != ''){
                header("Location: error.php");
                echo "Extensao";
                return false;
            }
            if($_FILES["imagem".$x]["size"] > 500000){//500000
                header("Location: error.php");
                echo "Tamanho";
                return false;
            }
        }
        return true;
    }
    function checkimagesAf(){
        $empty = 0;
        for($x = 1; $x < 11; $x++){
            if($_FILES["imagem".$x]["error"] <= 1){
                continue;
            }else if($_FILES["imagem".$x]["size"] == 0){
                $empty++;
            }else{
                return false;
            }
        }
        if($empty == 10){
            return false;
        }
        return true;
    }
    function uploadImagemCompleto($titulo, $id_story){

        function images($titulo, $id_page){

            function uploadImagem($name_imagem,$pasta_destino,$nome_principal,$id_page){

                global $pdo;
                $name = $_FILES[$name_imagem];

                $upload_arquivo = $pasta_destino.$nome_principal;
                move_uploaded_file($name['tmp_name'], $upload_arquivo);

                $page = "INSERT INTO images values(NULL, '$id_page', '$upload_arquivo')";
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
                echo "Titulo";
                return false;
            } 
            return true;
        }
        function tituloreplacestuff($titulo){
            preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", '/[!@#$%^&*(),.?":{}|<>\s]/'),explode(" ","a A e E i I o O u U n N"),$titulo);
            preg_replace(" ", "-",$titulo);
            echo $titulo;
            return $titulo;
        }

        /* EM SI */
        global $pdo;
        $id_page = -1;

        Createpage($id_story, 1);
        $id_page = RetornarIdPage($id_story, 1);

        if(checktitulo($titulo)){
            $titulo = tituloreplacestuff($titulo);
        } 
        
        if(checktitulo($titulo)){
            if($id_page != -1){
                images($titulo, $id_page);
            }
        }
    }

    /* REFERENCES */

    function checkreferenceAf(){
        $referencia = $_POST['link-reference'];
        if($referencia != ''){
            return true;
        }else{
            //header("Location: criacao.php");
            return false;
        }
    }
    function referencia($referencia, $id_story, $expl){
        global $pdo;
        Createpage($id_story, 2);
        $id_page = RetornarIdPage($id_story, 2);
        $reference = "INSERT INTO reference values(NULL, '$id_page', '$referencia')";
        $prepare = $pdo->prepare($reference);
        $prepare->execute();
        //header("Location: criacao.php");
    }

    /* IN ITSELF */
    
    $titulo = $_POST['titulo'];
    $referencia = $_POST['link-reference'];
    $perfil = -1;
    $id_story = 0;
    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
    foreach($pdo->query($sql) as $key => $value){
        $perfil = $value['fk_id_profile'];
    }
    if($perfil == -1)header("Location: error.php");
    else{

        if(checkimagesBef())
        {
            $id_story = uploadHistoria($titulo, $perfil);

            if($id_story != -1){
                history($historia, $id_story);
                if(checkimagesAf())uploadImagemCompleto($titulo, $id_story);
                if(checkreferenceAf())referencia($referencia, $id_story, 'bla bla bla');
            }
        }
    }
?>