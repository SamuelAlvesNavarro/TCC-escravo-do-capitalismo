<?php
    $pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');
    $email = null;
    $senha = null;

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM user_common WHERE email = '$email' and senha = '$senha'";

    $prepare = $pdo->prepare($sql);
    $prepare -> execute();

    if($prepare -> rowCount() > 0){
        session_start();
        $_SESSION['email'] = $email;
        header("Location:central.php");
    }else{
        echo "Error: login não efetuado";
    }
?>