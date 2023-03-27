<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 34 de PHP - MySQL: Operador LIKE</title>
</head>
<body>

    <table border="1">
        <thead>
            <td>Codigo</td>
            <td>Produto</td>
            <td>Preço</td>
            <td>Quantidade</td>
            <td>Categoria</td>
        </thead>
        <tbody>
<?php

    include "conexao.inc";

    $vpes = "t%";

    $sql = "SELECT * FROM tb_produtos WHERE codigo LIKE '$vpes'";
    $res = mysqli_query($con, $sql);
    
    while($reg = mysqli_fetch_row($res)){
        $vcod = $reg[0]; 
        $vprod = $reg[1];
        $vpreco = $reg[2];
        $vqtde = $reg[3];
        $vcat = $reg[4];

        echo "<tr>";
        echo "<td>$vcod</td><td>$vprod</td><td>$vpreco</td><td>$vqtde</td><td>$vcat</td>";
        echo "</tr>";
    }

    mysqli_close($con);
    
?>
        </tbody>
    </table>

</body>
</html>