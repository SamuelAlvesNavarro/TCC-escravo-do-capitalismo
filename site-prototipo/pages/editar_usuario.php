<?php
    require "includes/conexao.php";
    require "includes/online.php";
    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);
    $nome = $_POST['nome'];
    $emailTroca = $_POST['email'];
    $senha = $_POST['senha'];
    $apelido = $_POST['apelido'];


    $checkEmail = "SELECT * FROM user_common WHERE email = '$emailTroca'";
    foreach($pdo->query($checkEmail) as $key => $value){
        echo $check = $value['email'];
    }

    if($emailTroca != $email){
        if($check == $emailTroca){
            header("Location:error.php");
            exit;
        }
    }

    $sql = "UPDATE user_common SET nome = '$nome', email = '$emailTroca', senha = '$senha', apelido = '$apelido' WHERE fk_id_profile = '$perfil'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    header("Location:acesso.html");


?>