<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";
    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);
    $nome = $_POST['nome'];
    $emailTroca = $_POST['email'];
    $senha = $_POST['senha'];
    $apelido = $_POST['apelido'];


    $checkEmail = "SELECT * FROM user_common WHERE email = '$emailTroca'";
    foreach($pdo->query($checkEmail) as $key => $value){
        $check = $value['email'];
    }

    if($emailTroca != $email){
        if($check == $emailTroca){
            header("Location:error.php?erro=9");
            exit;
        }
    }

    $sql = "UPDATE user_common SET nome = '$nome', email = '$emailTroca', senha = '$senha', apelido = '$apelido' WHERE fk_id_profile = '$perfil'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    require "includes/closing_session.php";
?>