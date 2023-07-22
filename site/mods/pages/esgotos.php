<?php
    require "includes/conexao.php";
    require "includes/online.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esgotos</title>
    <link rel="stylesheet" href="../css/esgotos.css">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <style>
        .to-center{
            padding: 20px;
            position: fixed;
            top: 0;
            right: 50px;
            font-size: 30px;
            background: #121212;
            z-index: 1000;
        }
        .to-center a{
            color: white;
        }
    </style>
</head>
<body>
    <div class="to-center">
        <a href="esgotos.php"><i class="fa-solid fa-home"></i></a>
    </div>
    <div class="main">
        <h1 class="center">Caminhos</h1>
        <ul>
            <a href="correcao.php"><li>Centro de Correção de Histórias</li></a>
            <a href="story-center.php"><li>Centro de Controle de Histórias</li></a>
            <a href="report_center.php"><li>Centro de Controle de Denúncias</li></a>
            <a href="user_center.php"><li>Centro de Controle de Usuários</li></a>
        </ul>
    </div>
</body>
</html>

