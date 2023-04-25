<?php
    function images($titulo){

        function uploadImagem($name_imagem,$pasta_destino,$nome_principal){

            //Capturando os dados, e armazenando em variáveis locais, e variáveis de classe
            $name = $_FILES[$name_imagem];

            $nome_substituto = $nome_principal;

            $upload_arquivo = $pasta_destino.$nome_substituto;
            move_uploaded_file($name['tmp_name'], $upload_arquivo);

        }

        function gerarnomepasta($titulo, $num){
            if(is_dir("../img-story/$titulo")){
                if($num == 0) $titulo .= '(0)';

                $nump = $num + 1;
                $titulo = str_replace("($num)", "($nump)", $titulo);

                gerarnomepasta($titulo, $nump);
            }else{
                mkdir('../img-story/' . $titulo, 0777, false);
                callupload($titulo);
            }
        }

        function callupload($titulo){
            for($x = 1; $x < 11; $x++){
                uploadImagem("imagem".$x,"../img-story/$titulo/","$titulo"."-img-".$x);
            }
        }

        $titulo = gerarnomepasta($titulo, 0);

        header("Location:criacao.php");
    }

    function checktitulo($titulo){
        if($titulo == "cu"){
            header("Location:error.php");
            return false;
        } 
    }

    $titulo = $_POST['titulo'];

    if(checktitulo($titulo)) $titulo = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", '/[!@#$%^&*(),.?":{}|<>\s]/'),explode(" ","a A e E i I o O u U n N"),$titulo);
    if(checktitulo($titulo)){
        images($titulo);
    }
?>