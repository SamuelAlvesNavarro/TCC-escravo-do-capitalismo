<?php
    require "includes/conexao.php";
    require "includes/online.php";
    include "includes/menu.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            padding: 20px;
        }

            <?php
                cssMenu();
            ?>
    </style>
</head>
<body data-bs-theme="dark">
        <?php
            menu();
        ?>
    <h1>Cadastro - Mod </h1>
    <br>
    <form method="post" action="cadastro-mod_exe.php">
        <label for="">Nome:</label>
        <input type="text" name="name">
        <br>
        <label for="">Email:</label>
        <input type="email" name="email">
        <br>
        <label for="">Senha:</label>
        <input type="password" name="senha">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>