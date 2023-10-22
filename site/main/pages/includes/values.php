<?php
    $ganhoDeMoedas = 50;
    $perdaDeMoedas = -50;
    $ganhoDePontosLeitor = 100;


    /* ENCRYPT PASSWORD*/

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '123456789101112a';
    $encryption_key = "escravo-do-capitalismo";
    $decryption_iv = $encryption_iv ;
    $decryption_key = $encryption_key;
?>