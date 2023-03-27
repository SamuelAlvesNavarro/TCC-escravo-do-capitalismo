<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 38 de PHP - MySQL: Comando Update</title>
</head>
<body>

    <?php

    include "conexao.inc";

    //UPDATE tabela SET campo a ser alterado WHERE condição
    $sql = "UPDATE tb_cadastro SET telefone = '318888888' WHERE cod = 9";

    $res = mysqli_query($con, $sql);

    if($res){
        echo "Resgistro atualizado com sucesso!";
    } else {
        echo "ERRO na autalização do registro";
    }

    mysqli_close($con);

    ?>

</body>
</html>