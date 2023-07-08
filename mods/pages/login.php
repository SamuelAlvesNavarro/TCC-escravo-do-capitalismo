<?php
    require "includes/conexao.php";
    
    $email = null;
    $senha = null;

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM mods WHERE email = '$email' and senha = '$senha'";

    $prepare = $pdo->prepare($sql);
    $prepare -> execute();

    if($prepare -> rowCount() > 0){
        require "includes/criasession.php";
        $_SESSION['email'] = $email;
        header("Location:esgotos.php");
        session_destroy();

    }else{
        echo "Error: login não efetuado";
    }
?>