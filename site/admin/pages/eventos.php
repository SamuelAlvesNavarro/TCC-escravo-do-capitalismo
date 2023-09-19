<?php
    require "includes/conexao.php";
    require "includes/online.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css?v=1.01" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Centro de Eventos</title>
</head>
<body data-bs-theme="dark">
    <?php
        require "includes/menu.php";
    ?>

    <h1 align="center">Centro de Gadgets</h1>

    <a href="adicionar-eventos.php"><button class="btn btn-light">Adicionar novo Evento</button></a>

    <h2>Eventos ativos</h2>

    <table>
        <thead class="thead-dark row">
            <tr>
                <th scope="col">Tipo</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descrição</th>
                <th scope="col">Alterar</th>
                <th scope="col">Desativar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <?php
            $sql = "SELECT * FROM evento WHERE active = 1";
            foreach($pdo->query($sql) as $key => $value):
        ?>
            <tr class="row">
                <td class="col"><?php echo $value['type']; ?></td>
                <td class="col"><?php echo $value['titulo']; ?></td>
                <td class="col"><?php echo $value['descr']; ?></td>
                <td><a href="alterar-gadget.php?id=<?php echo $value['id_evento']; ?>"><button class="btn btn-info col">Alterar</button></a></td>
                <td><a href="alterar-gadget.php?id=<?php echo $value['id_evento']; ?>"><button class="btn btn-primary col">Desativar</button></a></td>
                <td><a href="alterar-gadget.php?id=<?php echo $value['id_evento']; ?>"><button class="btn btn-danger col">Excluir</button></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>