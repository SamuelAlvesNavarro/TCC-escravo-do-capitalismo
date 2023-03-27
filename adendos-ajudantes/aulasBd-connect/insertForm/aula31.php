<?php

    include "conexao.inc";

    $vcod = $_POST['F_Cod'];
    $vprod = $_POST['F_Prod'];
    $vpreco = $_POST['F_Preco']; 
    $vqtde = $_POST['F_Qtde'];

    $sql = "INSERT INTO tb_produtos VALUES ('$vcod', '$vprod', $vpreco, $vqtde)";
    $res = mysqli_query($con, $sql);
    $linhas = mysqli_affected_rows($con);
    
    if($linhas == 1)
    {
        echo "Registro gravado com sucesso<br>";
    } else {
        echo "Falha na gravação do registro<br>";
    }

    mysqli_close($con);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 31 de PHP - MySQL: Comando Insert com formulário</title>
</head>
<body>

    <br>
    <a href="formAula-31.html">Voltar</a>

</body>
</html>