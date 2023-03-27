<?php

    include "conexao.inc";

    $vnome = "Eit";
    $vuser = "s";
    $vsenha = "123450";
    $vemail = "example@gmail.com";
    $vtel = "08090";
    $vst = 1;
    $vobs = "tudo ok eit";

    $sql = "INSERT INTO tb_cadastro VALUES (NULL, '$vnome', '$vuser', '$vsenha', '$vemail', '$vtel', $vst, '$vobs')";
    $res = mysqli_query($con, $sql);
    $num = mysqli_affected_rows($con);
    echo "$num registro inserido.";

    mysqli_close($con);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 30 de PHP - MySQL: Comando Insert</title>
</head>
<body>

</body>
</html>