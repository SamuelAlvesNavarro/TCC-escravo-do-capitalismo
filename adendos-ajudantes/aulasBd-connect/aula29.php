<?php

    include "conexao.inc";

    $res = mysqli_query($con, 'select * from tb_cadastro');
    $linhas = mysqli_num_rows($res);
    echo "Encontrados $linhas registros na tabela tb_cadastro";

    mysqli_close($con);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 29 de PHP - Executando comandos MySQL</title>
</head>
<body>

</body>
</html>