<?php
    require "../includes/online.php";
    require "../includes/conexao.php";

    $emailUser = $_POST['emailUser'];

    //inserindo usuário a tabela BAN
    $dataBan = date("d/m/Y");
    $dataBan = implode('-', array_reverse(explode('/', $dataBan)));
    $ban = "INSERT INTO ban values(NULL, '$emailUser', '$dataBan')";
    $prepare = $pdo->prepare($ban);
    $prepare->execute();

    //deletando usuário banido e tudo ligado a ele
    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$emailUser'";
    foreach($pdo->query($sql) as $key => $value){
        $id = $value['fk_id_profile'];
    }

    $delete = "DELETE FROM profile WHERE id_profile = '$id'";
    $prepare = $pdo->prepare($delete);
    $prepare->execute();

    header("Location: ../user_center.php");
?>