<?php
    $titulo = $_POST['titulo'];

    function uploadImagem($name_imagem,$pasta_destino,$nome_principal){

            //Capturando os dados, e armazenando em variáveis locais, e variáveis de classe
            $name = $_FILES[$name_imagem];

            $nome_substituto = $nome_principal;

            $upload_arquivo = $pasta_destino.$nome_substituto;
            move_uploaded_file($name['tmp_name'], $upload_arquivo);

    }
    
    for($x = 0; $x < 10; $x++){
        uploadImagem("imagem".$x+1,"img-story/","$titulo".$x+1);
    }

    if(preg_match('/[!@#$%^&*(),.?":{}|<>]/', $senha) || preg_match('/[áàãâéêíóôõúüç]/', $senha) || preg_match('/\s/', $senha)){
        $validaSenha = false;
    }
?>