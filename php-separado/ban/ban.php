<?php
    require "includes/online.php";
    require "includes/conexao.php";

    $emailMod = $_SESSION['email'];
    $emailUser = $_POST['emailUser'];

    //inserindo usuário a tabela BAN
    $dataBan = date("d/m/Y");
    $dataBan = implode('-', array_reverse(explode('/', $dataBan)));
    $ban = "INSERT INTO ban values(NULL, '$emailUser', '$emailMod', '$dataBan')";
    $prepare = $pdo->prepare($ban);
    $prepare->execute();

    //deletando usuário banido e tudo ligado a ele
    $delete = "DELETE FROM user_common WHERE $emailUser";
    $prepare = $pdo->prepare($delete);
    $prepare->execute();

?>