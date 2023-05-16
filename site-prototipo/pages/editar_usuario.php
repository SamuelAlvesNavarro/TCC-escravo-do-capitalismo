<?php
    require "includes/conexao.php";
    require "includes/online.php";
    $email = $_SESSION['email'];
    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
    foreach($pdo->query($sql) as $key => $value){
        $perfil = $value['fk_id_profile'];
    }
    $nome = $_POST['nome'];
    $emailTroca = $_POST['email'];
    $senha = $_POST['senha'];
    $apelido = $_POST['apelido'];

<<<<<<< HEAD

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

=======
>>>>>>> 2cdc95c002881a8d867c24e9f9ebd7d296e737ba
    $sql = "UPDATE user_common SET nome = '$nome', email = '$emailTroca', senha = '$senha', apelido = '$apelido' WHERE fk_id_profile = '$perfil'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    header("Location:acesso.html");


?>