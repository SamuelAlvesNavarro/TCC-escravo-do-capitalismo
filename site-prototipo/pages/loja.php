<?php
    require "includes/conexao.php";
    require "includes/returnUser.php";
    $compra = null;
    $compra = $_SESSION['loja'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            width: 50px;
            height: 50px;
            background-size: cover;
            background-repeat: no-repeat;
            transition: .5s linear;
        }
        div:hover{
            position: absolute;
            width: 500px;
            height: 500px;
        }
    </style>
</head>
<body>
    <h1>Backgrouds</h1>

    <?php
        echo "<form method='post' action='compra.php'>";
            $gadget = "SELECT * FROM gadget WHERE g_status = 1 and type = 1";
            foreach($pdo->query($gadget) as $key => $value){
                $item = $value['in_it'];
                $preco = $value['preco'];
                $id = $value['id_gadget'];
                echo "<div style='$item'></div>";
                echo "$preco";
                echo "
                    <input type='number' name='gadget' style='overflow: hidden;' hidden value='$id'>
                    <input type='number' name='gadget' style='overflow: hidden;' value='$preco'> 
                <input type='submit' value='Comprar'>
                ";
            }
            echo "</form>";
    ?>
    
    <h1>Foto</h1>

    <?php
<<<<<<< HEAD
        echo "<h1>Foto</h1>";

        echo "<form method='post' action='compra.php'>";
            $gadget = "SELECT * FROM gadget WHERE g_status = 1 and type = 0";
            foreach($pdo->query($gadget) as $key => $value){
                $item = $value['in_it'];
                $preco = $value['preco'];
                $id = $value['id_gadget'];
                echo "<div style='$item'></div>";
                echo "$preco";
                echo "
                    <input type='number' name='gadget' style='overflow: hidden;' value='$id'>
                    <input type='number' name='gadget' style='overflow: hidden;' value='$preco'> 
                <input type='submit' value='Comprar'>
                ";
            }
            echo "</form>";
=======
        $gadget = "SELECT * FROM gadget WHERE g_status = 1 and type = 0";
        foreach($pdo->query($gadget) as $key => $value){
            $item = $value['in_it'];
            $preco = $value['preco'];
            echo "<div style='$item'></div>";
            echo "$preco";
            echo "
                <form method='post' action='compra.php'>
                    <input type='submit' value='Comprar'>
                </form>
            ";
        }
>>>>>>> 84cdb6c91f1c8abbe30e944bd74cacada01ae8ca
    ?>
</body>
</html>