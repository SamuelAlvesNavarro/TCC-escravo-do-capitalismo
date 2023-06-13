<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";
    $text = $_POST['text'];
    $profile = returnProfileId($email);
    $id_comment = $_POST['story'];
    $code = $_POST['escolha'];

    $sql = "SELECT * FROM comment WHERE id_comment = '$id_comment'";
    foreach($pdo->query($sql) as $key => $value){
        $fk_id_profile = $value['fk_id_profile'];
    }

    $denucia = "INSERT INTO report_comment VALUES(NULL, $fk_id_profile, $profile, $id_comment, $text, $code, 0)";
    $prepare = $pdo->prepare($denuncia);
    $prepare->execute();
    
?>