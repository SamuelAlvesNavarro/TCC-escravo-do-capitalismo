<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 36 e 37 de PHP - MySQL: Deletando registros selecionados - Parte 2</title>
</head>
<body>

    <form name="f_excluir" method="post" action="aula36-37.php">
        <table border="1">

            <tr>
                <td>Codigo</td>
                <td>Nome</td>
                <td>Selecionar</td>
            </tr>

            <?php

                include "conexao.inc";

                if(isset($_POST['sel']))
                {
                    foreach($_POST['sel'] as $codigo){
                        $sql = "DELETE FROM tb_cadastro WHERE cod = $codigo";
                        $res = mysqli_query($con, $sql);
                    }
                } else{
                    echo "Form NÃO submetido";
                }

                $sql = "SELECT * FROM tb_cadastro ORDER BY cod";
                $res = mysqli_query($con, $sql);

                while($reg = mysqli_fetch_row($res)){
                    $vcod = $reg[0];
                    $vnome = $reg[1];
                    
                    echo "<tr>";
                    echo "<td>$vcod</td><td>$vnome</td>";
                    echo "<td align=center><input type=checkbox value=$reg[0] name=sel[]></td>";
                    echo "</tr>";
                }

                mysqli_close($con);
            ?>

        </table>

        <br>

        <input type="submit" value="Excluir" name="bt_excluir">

    </form>

</body>
</html>