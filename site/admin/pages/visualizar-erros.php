<?php
    require "includes/conexao.php";
    require "includes/online.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Visualizar Erros</title>
</head>
<body data-bs-theme="dark">
    <?php
        include "includes/menu.php";
    ?>

    <h1 align="center" class="m-5">Erros específicos que o usuário pode gerar no site</h1>

    <table align="center" class="table table-dark table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Severidade</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php 
                $sql = "SELECT * FROM error";
                foreach($pdo->query($sql) as $key => $value):
            ?>
                <tr scope="row">
                   <td><?php echo $value['id_error']; ?></td>
                   <?php 
                        if($value['cod_error'] == 1){
                            $cod = "Simples";
                        } else if($value['cod_error'] == 2){
                            $cod = "Severo";
                        }else{
                            $cod = "Banimento automático";
                        }
                   ?>
                   <td><?php echo $cod; ?></td>
                   <td><?php echo $value['description']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>