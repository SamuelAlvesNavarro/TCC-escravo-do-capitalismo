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
    <title>Centro de Controle de Gadgets</title>
    <style>
        .foto{
            border: 2px solid black;
            border-radius: 50%;
            width: 200px;
            height: 200px;
            background-repeat: no-repeat;
            background-position: center;
        }
        .fundo{
            border: none;
            width: 200px;
            height: 200px;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>
<body data-bs-theme="dark">
    <?php
        require "includes/menu.php";
    ?>
    <!-- Controle de gadgets  pela tabela !-->
        <h2>Fotos de perfil - ATIVAS</h2>

    <table align="center" class="col-3 table table-striped border border-black border-1 p-2">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID Gadget</th>
                <th scope="col">Foto</th>
                <th scope="col">Preço</th>
                <th scope="col">Alterar</th>
                <th scope="col">Desativar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $gadget = 'SELECT * FROM gadget WHERE type = 0 AND g_status = 1';
                foreach($pdo->query($gadget) as $key => $value){

                    echo
                    '<tr>
                        <td scope="row">' 
                            .$value['id_gadget']. 
                        '</td>'.

                        '<td scope="row"><div class="foto" style="'.$value['in_it'].'"></div></td>'.

                        '<td scope="row">'
                            .$value['preco'].
                        '</td>'.

                        '<td scope="row"><a href="alterar-gadget.php?id='.$value['id_gadget'].'"><button>Alterar</button></a></td>'.
                        '<td scope="row"><a href="desativar-gadget.php?id='.$value['id_gadget'].'"><button>Desativar</button></a></td>'.
                        '<td scope="row"><a href="excluir-gadget.php?id='.$value['id_gadget'].'"><button>Excluir</button></a></td>'.
                    '</tr>';
                }
            ?>
        </tbody>
    </table>

        <h2>Fundos de perfil - ATIVOS</h2>

    <table>
        <thead>
            <tr>
                <th scope="col">ID Gadget</th>
                <th scope="col">Fundo</th>
                <th scope="col">Preço</th>
                <th scope="col">Alterar</th>
                <th scope="col">Desativar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $gadget = 'SELECT * FROM gadget WHERE type = 1 AND g_status = 1';
                foreach($pdo->query($gadget) as $key => $value){

                    echo
                    '<tr>
                        <td scope="row">' 
                            .$value['id_gadget']. 
                        '</td>'.

                        '<td scope="row"><div class="fundo" style="'.$value['in_it'].'"></div></td>'.

                        '<td scope="row">'
                            .$value['preco'].
                        '</td>'.

                        '<td scope="row"><a href="alterar-gadget.php?id='.$value['id_gadget'].'"><button>Alterar</button></a></td>'.
                        '<td scope="row"><a href="desativar-gadget.php?id='.$value['id_gadget'].'"><button>Desativar</button></a></td>'.
                        '<td scope="row"><a href="excluir-gadget.php?id='.$value['id_gadget'].'"><button>Excluir</button></a></td>'.
                    '</tr>';
                }
            ?>
        </tbody>
    </table>

        <h2>Fotos de perfil - DESATIVADAS</h2>

    <table>
    <thead>
        <tr>
            <th scope="col">ID Gadget</th>
            <th scope="col">Foto</th>
            <th scope="col">Preço</th>
            <th scope="col">Alterar</th>
            <th scope="col">Desativar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $gadget = 'SELECT * FROM gadget WHERE type = 0 AND g_status = 0';
            foreach($pdo->query($gadget) as $key => $value){

                echo
                '<tr>
                    <td scope="row">' 
                        .$value['id_gadget']. 
                    '</td>'.

                    '<td scope="row"><div class="foto" style="'.$value['in_it'].'"></div></td>'.

                    '<td scope="row">'
                        .$value['preco'].
                    '</td>'.

                    '<td scope="row"><a href="alterar-gadget.php?id='.$value['id_gadget'].'"><button>Alterar</button></a></td>'.
                    '<td scope="row"><a href="reativar-gadget.php?id='.$value['id_gadget'].'"><button>Reativar</button></a></td>'.
                '</tr>';
            }
        ?>
    </tbody>
    </table>


        <h2>Fundos de perfil - DESATIVADOS</h2>

    <table>
    <thead>
        <tr>
            <th scope="col">ID Gadget</th>
            <th scope="col">Fundo</th>
            <th scope="col">Preço</th>
            <th scope="col">Alterar</th>
            <th scope="col">Desativar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $gadget = 'SELECT * FROM gadget WHERE type = 1 AND g_status = 0';
            foreach($pdo->query($gadget) as $key => $value){

                echo
                '<tr>
                    <td scope="row">' 
                        .$value['id_gadget']. 
                    '</td>'.

                    '<td scope="row"><div class="fundo" style="'.$value['in_it'].'"></div></td>'.

                    '<td scope="row">'
                        .$value['preco'].
                    '</td>'.

                    '<td scope="row"><a href="alterar-gadget.php?id='.$value['id_gadget'].'"><button>Alterar</button></a></td>'.
                    '<td scope="row"><a href="reativar-gadget.php?id='.$value['id_gadget'].'"><button>Reativar</button></a></td>'.
                '</tr>';
            }
        ?>
    </tbody>
    </table>
    <!-- Controle de gadgets  pela tabela !-->


    <!-- Controle de gadgets  por outra página !-->
    <a href="adicionar-gadgets.php"><button>Adicionar novo gadget</button></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>