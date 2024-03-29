<?php
    // Lista de palavras que você quer filtrar
    $palavrasProibidas = array("caralho", "cu", "buceta", 
    "vtnc", "pqp", "fdp", "porra", 
    "viado", "viadinho", "viadão", "baitola", 
    "foder", "vsfd", "xoxota", "xota", "cacete", 
    "pica", "pika", "pau", "arrombado", 
    "arrombada", "bct", "fodido", "fodida", "merda", 
    "bicha", "boiola", "puta", "fodendo", "fds", 
    "foda-se", "foda", "caceta", "boquete", 
    "siririca", "brocha", "desgraçado", 
    "desgraçada", "punheta", "punheteiro", 
    "punheteira", "mongol", "retardado", "retardada", 
    "merda", "bosta", "escroto", "escrota", 
    "vagabundo", "vagabunda", "grelo", "piroca", 
    "puto", "nigga", "nigger", "cagado", "cagada", 
    "rola", "trouxa", "boqueteira", "boqueteiro", 
    "biscate", "balofo", "balofa", "bananão", 
    "corno", "corna", "chifrudo", "chifruda"
    );

    // Função para verificar palavras proibidas no texto
    function verificarPalavras($texto, $palavrasProibidas) {
        foreach ($palavrasProibidas as $palavra) {
            if (preg_match('/(?<!\*)\b' . preg_quote($palavra, '/') . '\b/i', $texto)) {
                return false; // Encontrou um palavrão
            }
        }
        return true; // Não encontrou palavrões
    }

    // Função para verificar tags HTML perigosas
    function verificarTagsHTML($texto) {
        $tagsPerigosas = array("script", "iframe", "php");
        foreach ($tagsPerigosas as $tag) {
            if (stripos($texto, "<$tag>") !== false) {
                echo "foi aqui vei";
                return false; // Encontrou tag perigosa
            }
        }
        return true; // Não encontrou tags perigosas
    }

    // Função para verificar código JavaScript ou PHP
    function verificarCodigo($texto) {
        if (preg_match('/<\s*(script|php)[^>]*>[^<]*<\s*\/\s*(script|php)\s*>/i', $texto)) {
            return false; // Encontrou código perigoso
        }
        return true; // Não encontrou código perigoso
    }

    function verificarTexto($texto, $except){

        global $palavrasProibidas;

        if($except == 0){ // com tudo 
            if(verificarPalavras($texto, $palavrasProibidas) && verificarTagsHTML($texto) && verificarCodigo($texto)){
                return true;
            }else{
                return false;
            }
        }

        if($except == 1){ // sem as tags (nas histórias)
            if(verificarPalavras($texto, $palavrasProibidas) && verificarCodigo($texto)){
                return true;
            }else{
                return false;
            }
        }
    }
?>