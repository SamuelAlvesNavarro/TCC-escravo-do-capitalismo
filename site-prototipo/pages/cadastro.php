<?php
    $pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');

    $nome = $_POST["name"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmarsenha = $_POST["confirmarsenha"];

    $sql = "SELECT * FROM user_common WHERE email = ? ";

    $prepare = $pdo->prepare($sql);

    $prepare->bindParam(1, $email);

    if($prepare->execute() == true){
        
    }
?>
