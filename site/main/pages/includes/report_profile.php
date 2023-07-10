<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";
    /*$text = $_POST['text'];
    $profile = returnProfileId($email);
    $fk_id_profile = $_POST['profile'];
    $code = $_POST['escolha'];

    $denucia = "INSERT INTO report_profile VALUES(NULL, $fk_id_profile, $profile, $text, $code, 0)";
    $prepare = $pdo->prepare($denuncia);
    $prepare->execute();*/
    
    function generateReport($reportado, $reportando, $text, $code){

        global $pdo;
        $denuncia = "INSERT INTO report_profile VALUES(NULL, $reportado, $reportando, '$text', $code, 0)";
        $prepare = $pdo->prepare($denuncia);
        $prepare->execute();
        
    }
?>