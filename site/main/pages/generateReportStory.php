<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";

    $perfil = returnProfileId($_SESSION['email']);
    $reason = $_POST['reason'];
    $reported_story = $_POST['id_story'];

    $sql = "insert into report_story values('', $reported_story, $perfil, '$reason', 1)";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    header("Location: central.php");
?>