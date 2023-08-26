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
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Alterar Gadget</title>
</head>
<body>
    <?php
        require "includes/menu.php";
    ?>
    <form action="alterar-gadget_exe.php" method="post">
        <label for="">Preço: </label><br>
        <input type="number" name="preco" value="<?php echo $preco ?>"><br>
        <button>Alterar</button>
    </form>
</body>
</html>