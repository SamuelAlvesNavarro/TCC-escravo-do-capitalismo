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

    <table align="center" class="table table-dark table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID Evento</th>
                <th scope="col">Tipo</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Editar</th>
                <th scope="col">Desativar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
                $sql = "SELECT * FROM evento WHERE active = 1";
                foreach($pdo->query($sql) as $key => $value):
            ?>
                <tr scope="row">
                    <td><?php echo $value['id_evento']; ?></td>
                    <td><?php echo $value['type']; ?></td>
                    <td><?php echo $value['titulo']; ?></td>
                    <td><?php echo $value['descr']; ?></td>
                    <td><a href="alterar-gadget.php?id=<?php echo $value['id_evento']; ?>"><button class="btn btn-info col">Alterar</button></a></td>
                    <td><a href="desativar_evento.php?id_evento=<?php echo $value['id_evento']; ?>"><button class="btn btn-primary col">Desativar</button></a></td>
                    <td><a href="alterar-gadget.php?id=<?php echo $value['id_evento']; ?>"><button class="btn btn-danger col">Excluir</button></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <br><br><br>

    <h2>Eventos inativos</h2>

    <table align="center" class="table table-dark table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID Evento</th>
                <th scope="col">Tipo</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Editar</th>
                <th scope="col">Ativar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
                $sql = "SELECT * FROM evento WHERE active = 0";
                foreach($pdo->query($sql) as $key => $value):
            ?>
                <tr scope="row">
                    <td><?php echo $value['id_evento']; ?></td>
                    <td><?php echo $value['type']; ?></td>
                    <td><?php echo $value['titulo']; ?></td>
                    <td><?php echo $value['descr']; ?></td>
                    <td><a href="alterar-gadget.php?id=<?php echo $value['id_evento']; ?>"><button class="btn btn-info col">Alterar</button></a></td>
                    <td><a href="ativar_evento.php?id_evento=<?php echo $value['id_evento']; ?>"><button class="btn btn-primary col">Ativar</button></a></td>
                    <td><a href="alterar-gadget.php?id=<?php echo $value['id_evento']; ?>"><button class="btn btn-danger col">Excluir</button></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>