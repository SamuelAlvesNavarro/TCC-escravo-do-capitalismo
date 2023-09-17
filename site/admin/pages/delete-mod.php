<?php
    require "includes/conexao.php";
    require "includes/online.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css?v=1.01" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Delete Mod</title>
</head>
<body data-bs-theme="dark">
    <?php
        include "includes/menu.php";
    ?>
    <h1 align="center" class="m-5">Moderadores do site</h1>

    <table align="center" class="table table-dark table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID mod</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
                $mod = 'SELECT * FROM mods';
                foreach($pdo->query($mod) as $key => $value){

                    echo
                    '<tr scope="row">
                        <td>' 
                            .$value['id_mod']. 
                        '</td>'.

                        '<td>'
                            .$value['nome'].
                        '</td>'.

                        '<td>'
                            .$value['email'].
                        '</td>'.

                        '<td><a href="delete-mod_exe.php?id='.$value['id_mod'].'"><button class="btn btn-danger">Excluir</button></a></td>'.
                    '</tr>';
                }
            ?>
        </tbody>
    </table>

</body>
</html>