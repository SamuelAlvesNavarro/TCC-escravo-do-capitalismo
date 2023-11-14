<?php
    require 'includes/online.php';
    require "includes/enviarErro.php";
    require "includes/conexao.php";
    require 'includes/checarTexto.php';
    global $pdo;

    /* FILTRAR CÓDIGO HTML E PHP */

    function contemTagsHTML($string){
        
        if(preg_match('/<.*>/', $string)) {
            return true; // A string contém HTML

        } else {
            return false; // A string não contém HTML
        }
    }

    function filtrarPHP($string) {
        $padrao = '/<\?php|<\?=|<\?/';
        
        if (preg_match($padrao, $string)) {
            return true; // A string contém código PHP
        } else {
            return false; // A string não contém código PHP
        }
    }

    function vazio($var){
        if(empty($var)){
            return true;
        }else{
            return false;
        }
    }

    $titulo = $_POST['titulo'];
        //Se vazio campo do titulo
        if(filter_var($titulo, FILTER_CALLBACK, array('options' => 'vazio'))){
            header("Location: criacao.php");
            exit;
        }

        
        if(!verificarTexto($titulo, 0)){
            sendToError(17);
            exit;
        }
        


    $email = $_SESSION['email'];
    $array = explode("\n", $_POST['story']);
    $historia = array_unique($array);
    $historia = implode("",$array);

    //Filtros da história
    if(contemTagsHTML($titulo)){
        sendToError(22);
        exit;
    }
    if(filtrarPHP($historia) || filtrarPHP($titulo)){
        sendToError(22);
        exit;
    }
    if(!verificarTexto($historia, 0)){
        sendToError(17);
        exit;
    }
    if(filter_var($historia, FILTER_CALLBACK, array('options' => 'vazio'))){
        header("Location: criacao.php");
        exit;
    }

    $remove = array("*1 ", " /*1", "*2 ", " /*2", "*3 ", " /*3", "*4 ", " /*4", "*5 ", " /*5", "*6 ", " /*6", "** ", " /**", "(s)", "(/s)");
    $add = array("<h1>", "</h1>", "<h2>", "</h2>", "<h3>", "</h3>", "<h4>", "</h4>", "<h5>", "</h5>", "<h6>", "</h6>", "<strong>", "</strong>", "<span class='un'>", "</span>");
    $historia = str_replace($remove, $add, $historia);

    /* CREATE STORY */

    function uploadHistoria($titulo, $perfil){
        global $pdo;
        $id_story = -1;
        $story = "INSERT INTO story values(NULL, 0, '$titulo', 0, 1, $perfil)";
        $prepare = $pdo->prepare($story);
        $prepare->execute();

        $story2 = "select max(id_story) from story where fk_id_profile = $perfil";
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
        $historia = reconHistory($historia);
        $historia = addslashes($historia);
        $history = "INSERT INTO history values(NULL, '$id_page', '$historia')";
        $prepare = $pdo->prepare($history);
        $prepare->execute();
    }

    /* IMAGES */

    function checkimagesBef(){
        for($x = 1; $x < 11; $x++){
            $extensao = pathinfo($_FILES['imagem'.$x]['name'], PATHINFO_EXTENSION);
            if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' && $extensao != ''){
                sendToError(15);
                return false;
            }
            if($_FILES["imagem".$x]["size"] > 500000){//500000
                sendToError(16);
                return false;
            }
        }
        return true;
    }
    function reconHistory($historia){
        $qt = 1;
        $eachOnes = array();
        for($x = 1; $x < 11; $x++){
            if($_FILES["imagem".$x]["size"] > 0){
                array_push($eachOnes, "<img".$qt.">");
                $qt++;
            }else{
                array_push($eachOnes, "");
            }
            
            $historia = str_replace("<img".$x.">", $eachOnes[$x-1], $historia);
        }

        return $historia;
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
        }else{
            return true;
        }
    }
    function uploadImagemCompleto($titulo, $id_story){

        function images($titulo, $id_page){

            function uploadImagem($name_imagem,$pasta_destino,$nome_principal,$id_page){

                global $pdo;
                $name = $_FILES[$name_imagem];

                $upload_arquivo = $pasta_destino.$nome_principal;
                move_uploaded_file($name['tmp_name'], $upload_arquivo);

                $page = "INSERT INTO images values(NULL, '$id_page', 0, '$upload_arquivo')";
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
                        $extensao = pathinfo($_FILES['imagem'.$x]['name'], PATHINFO_EXTENSION);
                        uploadImagem("imagem".$x,"../img-story/$titulo/","$titulo"."-img-".$x.".".$extensao, $id_page);
                    }
                }
            
            }

            $titulo = gerarnomepasta($titulo, 0, $id_page);
        }

        function tituloreplacestuff($titulo){
            $titulo = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", '/[!@#$%^&*(),.?":{}|<>\s]/'),explode(" ","a A e E i I o O u U n N"),$titulo);
            $titulo = str_replace(" ", "-", $titulo);
            $titulo = str_replace("'", "-", $titulo);
            $titulo = preg_replace('/[^A-Za-z0-9\-]/', '', $titulo);
            return $titulo;
        }

        /* EM SI */
        global $pdo;
        $id_page = -1;

        Createpage($id_story, 1);
        $id_page = RetornarIdPage($id_story, 1);

        $titulo = tituloreplacestuff($titulo);
        
        if($id_page != -1){
            images($titulo, $id_page);
        }
    }

    /* REFERENCES */

    function checkreferenceAf(){ // <--------------------------- IMP
        $empty = 0;
        for($x = 1; $x < 11; $x++){
            if($_POST['ref'.$x] == ''){
                $empty++;
            }
        }
        if($empty == 10){
            return false;
        }
        else{
            return true;
        }
        
    }
    function referencia($id_story){ // <--------------------------- IMP
        global $pdo;

        Createpage($id_story, 2);
        $id_page = RetornarIdPage($id_story, 2);

        for($x = 1; $x < 11; $x++){
            if($_POST['ref'.$x] != ''){
                $ref = $_POST['ref'.$x];

                $reference = "INSERT INTO reference values(NULL, '$id_page', '$ref')";
                $prepare = $pdo->prepare($reference);
                $prepare->execute();
            }
        }
    }

    /* QUESTION */

    function checkQuestion(){
        //Se vazio algum campo da pergunta
        $questao = $_POST['question'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $d = $_POST['d'];
        $certa = $_POST['certa'];

        if($certa != 'a' && $certa != 'b' && $certa != 'c' && $certa != 'd') return false;

        if(filter_var($questao, FILTER_CALLBACK, array('options' => 'vazio'))){
            header("Location: criacao.php");
            exit;
        }
        if(filter_var($a, FILTER_CALLBACK, array('options' => 'vazio'))){
            header("Location: criacao.php");
            exit;
        }
        if(filter_var($b, FILTER_CALLBACK, array('options' => 'vazio'))){
            header("Location: criacao.php");
            exit;
        }
        if(filter_var($c, FILTER_CALLBACK, array('options' => 'vazio'))){
            header("Location: criacao.php");
            exit;
        }
        if(filter_var($d, FILTER_CALLBACK, array('options' => 'vazio'))){
            header("Location: criacao.php");
            exit;
        }
        if(filter_var($certa, FILTER_CALLBACK, array('options' => 'vazio'))){
            header("Location: criacao.php");
            exit;
        }

        return true;
    }

    function storeQuestion($id_story){

        global $pdo;
        $questao = $_POST['question'];
        $questao = addslashes($questao);
        $a = $_POST['a'];
        $a = addslashes($a);

        $b = $_POST['b'];
        $b = addslashes($b);

        $c = $_POST['c'];
        $c = addslashes($c);

        $d = $_POST['d'];
        $d = addslashes($d);

        $certa = $_POST['certa'];
        $certa = addslashes($certa);
        
        $sql = "INSERT INTO question VALUES(NULL, '$id_story','$questao')";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $proc = "SELECT id_question FROM question WHERE fk_id_story = '$id_story'";
        foreach($pdo->query($proc) as $key => $value){
            $fk_id_question = $value['id_question'];
        }

        $ar = 0;
        $br = 0;
        $cr = 0;
        $dr = 0;

        if($certa == 'a') $ar = 1;
        else if($certa == 'b') $br = 1;
        else if($certa == 'c') $cr = 1;
        else if($certa == 'd') $dr = 1;
            
        $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$a', $ar)";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$b', $br)";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$c', $cr)";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "INSERT INTO answer VALUES(NULL, '$fk_id_question', '$d', $dr)";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        finishingTouches();
    }

    function finishingTouches(){

        require "includes/envio.php";
        $subject = "Não responda esse email";
        $body = "Sua história foi enviada para a correção dos moderadores. Assim que ela for corrigida (e possivelmente editada), ela será enviada para que você a aprove. Para saber se sua história foi corrigida, vá para a àrea dos escritores, na aba de aprovação. Sua história deverá estar lá dentro de alguns dias. Caso não encontre sua história na aba de aprovação, é possível que ela tenha sido rejeitada.";
        mandarEmail($subject, $body, $_SESSION['email']);

        header("Location: writerHub.php");
    }
    /* IN ITSELF */
    
    $perfil = -1;
    $id_story = 0;
    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
    foreach($pdo->query($sql) as $key => $value){
        $perfil = $value['fk_id_profile'];
    }

    //Upload da história
    if($perfil == -1){
        sendToError(10); 
        exit;
    }
    else{

        if(checkimagesBef() && checkreferenceAf() && checkQuestion())
        {
            $id_story = uploadHistoria($titulo, $perfil);

            if($id_story != -1 && $id_story != ''){
                history($historia, $id_story);
                if(checkimagesAf($historia))uploadImagemCompleto($titulo, $id_story);
                referencia($id_story); // <--------------------------- IMP
                storeQuestion($id_story, $perfil);
            }
        }
    }
?>