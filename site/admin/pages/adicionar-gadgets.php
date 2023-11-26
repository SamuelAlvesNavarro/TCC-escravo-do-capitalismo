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
<body  data-bs-theme="dark">
    <?php
        include "includes/menu.php";
    ?>
    <h1 align="center">Adicionar Novo Gadget</h1>
    <br>
    
    <h1>Tipos</h1>

    <ul>
        <li>0: Foto</li>
        <li>3: Fundo</li>
    </ul>
    
    <br>
    <form action="gadgets-upload.php" method="post" enctype="multipart/form-data" class="container border border-2 table-bordered p-4" style="width: 50%;">
        <label class="form-label">Gadget:</label>
        <input type="file" name="image" required class="form-control"><br><br>

        <label class="form-label">Nome do Gadget (Mostrado):</label>
        <input type="text" name="mostrado" id="" required class="form-control"><br><br>

        <label class="form-label">Nome do Gadget (Imagem):</label>
        <input type="text" name="name" id="" required class="form-control"><br><br>

        <label class="form-label">Preço: </label>
        <input type="number" name="preco" id="" required class="form-control"><br><br>

        <label class="form-label">Tipo: </label>
        <select name="type" id="" class="form-control">
            <option value="0">Foto</option>
            <option value="3">Fundo</option>
        </select><br><br>
        <button class="btn btn-primary">Enviar</button>
    </form>

    
</body>
</html>