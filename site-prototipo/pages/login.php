<?php
    $pdo = new PDO('mysql:host=localhost;dbname=id20545858_pi', 'id20545858_samuel', 'Agx3((dO5ze*n-]Y');
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