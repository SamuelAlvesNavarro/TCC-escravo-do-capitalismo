<?php
        require "includes/conexao.php";
        require "includes/online.php";

    $nome = $_POST["name"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO mods values(NULL, '$nome', '$email', '$senha')";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

                
    if($prepare->rowCount() <= 0){
        echo "Erro ao cadastrar o moderador, confira os dados";
        echo "<a href='cadastrar.php'>Volte</a>";
    }else{
        header("Location:cadastrar-mod.php");
    }
?>