<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 35 de PHP - MySQL: Comando Delete</title>
</head>
<body>

<?php

    include "conexao.inc";

    $sql = "DELETE FROM tb_cadastro WHERE cod = '3'";
    $res = mysqli_query($con, $sql);
    $lin = mysqli_affected_rows($con);

    if($lin > 0){
        echo "Registro deletado";
    } else {
        echo "Nenhum registro deletado";
    }

    mysqli_close($con);

?>

</body>
</html>