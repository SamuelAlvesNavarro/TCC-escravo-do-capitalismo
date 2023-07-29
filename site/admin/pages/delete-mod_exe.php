<?php
        require "includes/conexao.php";
        require "includes/online.php";

    $email = $_POST["email"];

    $sql = "DELETE FROM mods WHERE email = '$email'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    if($prepare->rowCount() <= 0){
        echo "Erro ao deletar o moderador, confira a email colocado";
        echo "<a href='cadastrar.php'>Volte</a>";
    }else{
        header("Location: delete-mod.php");
    }

?>