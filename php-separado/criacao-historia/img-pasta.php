<?php
    $titulo = $_POST['titulo'];
    settype($titulo, "string");
    function uploadImagem($name_imagem,$pasta_destino,$nome_principal){

            //Capturando os dados, e armazenando em variáveis locais, e variáveis de classe
            $name = $_FILES[$name_imagem];

            $nome_substituto = $nome_principal;

            $upload_arquivo = $pasta_destino.$nome_substituto;
            move_uploaded_file($name['tmp_name'], $upload_arquivo);

    }
    
    /*if(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $senha) || preg_match('/[áàãâéêíóôõúüç]/', $senha) || preg_match('/\s/', $senha)){
        
    }*/

    /*$titulo = trim($titulo, "k");

    echo $titulo;

    $str = "Hire freelance developer";
    echo trim($str, "Hir");*/
    $titulo = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", '/[!@#$%^&*(),.?":{}|<>\s]/'),explode(" ","a A e E i I o O u U n N"),$titulo);
    echo $titulo;

    for($x = 1; $x < 11; $x++){
        uploadImagem("imagem".$x,"img-story/","$titulo".$x);
    }

?>