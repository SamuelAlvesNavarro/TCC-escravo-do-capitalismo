<?php

    include "../conexao.inc";
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="X-UA-Compatible" content="text/html; charset=iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 44 de PHP - MySQL - Formulário com múltiplas tabelas</title>
</head>
<body>

    <h1>Pesquisa:</h1>

    <form name="foad" method="get" action="processaAula44.php">

        <label>Nome:</label><br>
        <input type="text" name="fnome"><br><br>

        <label>Selecione seu estado:</label><br>
        <select name="fuf">
            <?php

                $sql = "SELECT * FROM tb_uf ORDER BY uf";
                $res = mysqli_query($con, $sql);
                while($reg = mysqli_fetch_row($res)){
                    $uf = $reg[0];
                    $sigla = $reg[1];
                    echo "<option value=$sigla>$uf</option>";
                }

            ?>
        </select>
        <br><br>

        <label>Selecione seus meios de transporte favoritos</label><br>
        <?php

            $sql = "SELECT * FROM tb_transportes";
            $res = mysqli_query($con, $sql);
            while($reg = mysqli_fetch_row($res)){
                $cod = $reg[0];
                $tra = $reg[1];
                echo "<input type=checkbox name=ftransp[] value=$cod>$tra<br>";
            }
        ?>

        <br>

        <input type="submit" value="Gravar Pesquisa">

    </form>

</body>
</html>

<?php

    mysqli_close($con);

?>