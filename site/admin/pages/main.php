<?php
    require 'includes/conexao.php';
    require 'includes/online.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Central - Admin</title>
    <style>
        body{
            padding: 20px;
        }
    </style>
</head>
<body data-bs-theme="dark">
    <ul>
        <a href="gadgets.php"><li>Centro de Controle de Gadgets</li></a>
        <a href="cadastrar-mod.php"><li>Cadastrar Moderadores</li></a>
        <a href="delete-mod.php"><li>Deletar Moderadores</li></a>
        <a href="verificar-compras.php"><li>Verificar Compras de Gadgets</li></a>
        <a href="eventos.php"><li>Centro de Eventos</li></a>
        <a href="includes/closing_session.php"><li>Sair</li></a>
    </ul>
</body>
</html>