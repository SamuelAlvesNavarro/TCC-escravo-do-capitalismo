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
    $titulo = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", '/[!@#$%^&*(),.?":{}|<>\s]/'),explode(" ","a A e E i I o O u U n N"),$titulo);

    function gerarnomepasta($titulo){
        if(is_dir("img-story/$titulo")){
            $titulo .= '1';
            gerarnomepasta($titulo);
        }else{
            mkdir('img-story/' . $titulo, 0777, false);
            callupload($titulo);
        }
    }
    function callupload($titulo){
        for($x = 1; $x < 11; $x++){
            uploadImagem("imagem".$x,"img-story/$titulo/","$titulo"."-img-".$x);
        }
    }

    $titulo = gerarnomepasta($titulo);
?>