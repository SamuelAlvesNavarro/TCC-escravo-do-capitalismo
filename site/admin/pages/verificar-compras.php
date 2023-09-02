<?php
    require "includes/conexao.php";
    require "includes/online.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Compra dos usuários</title>
</head>
<body data-bs-theme="dark">
    <?php
        require "includes/menu.php";
    ?>

    <h1 align="center">Tabela de compra de gadgets</h1>

    <table align="center" class="table table-dark table-striped" border="2">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID Gadget</th>
                <th scope="col">Email</th>
                <th scope="col">User</th>
                <th scope="col">ID Profile</th>
                
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php

                $sql = "SELECT user_common.email as email, user_common.fk_id_profile as perfil, user_common.nome as nome, compra.fk_id_gadget as id_gadget FROM compra, user_common";
                foreach($pdo->query($sql) as $key => $value){
                    $perfil = $value['perfil'];

                    echo '
                        <tr scope="row">
                        <td>' .$value['id_gadget']. '</td>
                        <td>' .$value['email']. '</td>
                        <td>' .$value['nome']. '</td>
                        <td>' .$perfil. '</td>
                        </tr>
                    ';
                }

            ?>
        </tbody>
    </table>
</body>
</html>