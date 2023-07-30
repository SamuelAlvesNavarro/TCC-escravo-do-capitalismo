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
    <title>Adicionar gadgets</title>
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
</head>
<body>
    <form action="gadgets-upload.php" method="post" enctype="multipart/form-data">
        <label for="">Gadget:</label>
        <input type="file" name="image" required><br>
        <label for="">Nome do Gadget:</label>
        <input type="text" name="name" id="" required><br>
        <label for="">Preço: </label>
        <input type="number" name="preco" id="" required><br>
        <label for="">Tipo: </label>
        <input type="number" name="type" id="" required><br>
        <button>Enviar</button>
    </form>
</body>
</html>