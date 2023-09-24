<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";

    $perfil = returnProfileId($_SESSION['email']);
    $reason = $_POST['reason'];
    $reported_comment = $_POST['id_comment'];

    $sql = "select fk_id_profile from comment where id_comment = $reported_comment";
    foreach($pdo->query($sql) as $key => $value){
        $id_user_reported = $value['fk_id_profile'];
    }

    $sql = "insert into report_comment values('', $id_user_reported, $perfil, $reported_comment, '$reason', 1)";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    header("Location: central.php");
?>