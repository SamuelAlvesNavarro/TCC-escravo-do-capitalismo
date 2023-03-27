<?php

    include "../conexao.inc";

    $vcat1 = $_POST['F_Cat1'];
    $vcat2 = $_POST['F_Cat2'];
    $sql = "SELECT * FROM tb_produtos WHERE cat = $vcat1 OR cat = $vcat2";
    $res = mysqli_query($con, $sql);
    $li = mysqli_num_rows($res);
    echo "$li registros encontrados";

    mysqli_close($con);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 32 de PHP - MySQL: Comando Select - Parte 1</title>
</head>
<body>

</body>
</html>