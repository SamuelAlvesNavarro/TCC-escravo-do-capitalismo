<?php
    require "includes/online.php";
    require "includes/returnUser.php";
    require "includes/values.php";
    
    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);
    $nome = $_POST['nome'];
    $emailTroca = $_POST['email'];
    $senha = $_POST['senha'];
    $senha = openssl_encrypt($senha, $ciphering, $encryption_key, $options, $encryption_iv)
    $apelido = $_POST['apelido'];


    $check = '';
    $checkEmail = "SELECT * FROM user_common WHERE email = '$emailTroca'";
    foreach($pdo->query($checkEmail) as $key => $value){
        $check = $value['email'];
    }

    if($emailTroca != $email){
        if($check == $emailTroca){
            echo $emailTroca;
            exit;
        }
    }

    $sql = "UPDATE user_common SET nome = '$nome', email = '$emailTroca', senha = '$senha', apelido = '$apelido' WHERE fk_id_profile = '$perfil'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    header("Location: includes/closing_session.php");
?>