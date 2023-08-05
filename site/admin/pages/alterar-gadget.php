<?php
    require "includes/conexao.php";
    require "includes/online.php";

    $id = $_GET['id'];
    $_SESSION['id'] = $id;

    $gadget = "SELECT preco FROM gadget WHERE id_gadget = '$id'";
    foreach($pdo->query($gadget) as $key => $value){
        $preco = $value['preco'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Gadget</title>
</head>
<body>
    <form action="alterar-gadget_exe.php" method="post">
        <label for="">Preço: </label><br>
        <input type="number" name="preco" value="<?php echo $preco ?>"><br>
        <button>Alterar</button>
    </form>
</body>
</html>