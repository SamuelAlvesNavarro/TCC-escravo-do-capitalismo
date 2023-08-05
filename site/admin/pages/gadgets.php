<?php
    require "includes/conexao.php";
    require "includes/online.php";

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Controle de Gadgets</title>
</head>
<body>

    <!-- Controle de gadgets  pela tabela !-->
        <h2>Fotos de perfil - ATIVAS</h2>

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
                $gadget = 'SELECT * FROM gadget WHERE type = 0 AND g_status = 1';
                foreach($pdo->query($gadget) as $key => $value){

                    echo
                    '<tr>
                        <td scope="row">' 
                            .$value['id_gadget']. 
                        '</td>'.

                        '<td scope="row"><div style="'.$value['in_it'].'"></div></td>'.

                        '<td scope="row">'
                            .$value['preco'].
                        '</td>'.

                        '<td scope="row"><a href="alterar-gadget.php?id='.$value['id_gadget'].'"><button>Alterar</button></a></td>'.
                        '<td scope="row"><a href="desativar-gadget.php?id='.$value['id_gadget'].'"><button>Desativar</button></a></td>'.
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

                        '<td scope="row"><div style="'.$value['in_it'].'"></div></td>'.

                        '<td scope="row">'
                            .$value['preco'].
                        '</td>'.

                        '<td scope="row"><a href="alterar-gadget.php?id='.$value['id_gadget'].'"><button>Alterar</button></a></td>'.
                        '<td scope="row"><a href="desativar-gadget.php?id='.$value['id_gadget'].'"><button>Desativar</button></a></td>'.
                    '</tr>';
                }
            ?>
        </tbody>
    </table>

        <h2>Fotos de perfil - DESATIVADOS</h2>

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

                    '<td scope="row"><div style="'.$value['in_it'].'"></div></td>'.

                    '<td scope="row">'
                        .$value['preco'].
                    '</td>'.

                    '<td scope="row"><a href="alterar-gadget.php?id='.$value['id_gadget'].'"><button>Alterar</button></a></td>'.
                    '<td scope="row"><a href="desativar-gadget.php?id='.$value['id_gadget'].'"><button>Desativar</button></a></td>'.
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

                    '<td scope="row"><div style="'.$value['in_it'].'"></div></td>'.

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

</body>
</html>