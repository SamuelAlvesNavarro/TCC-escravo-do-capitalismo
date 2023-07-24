<?php
    include "includes/conexao.php";
    include "includes/online.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Correção Geral</title>
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <style>
        body{
            padding: 20px;
        }
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
        li a{
            color: yellow !important;
            cursor: pointer;
            font-weight: 700;
        }
    </style>
</head>
<body data-bs-theme="dark">
    <div class="to-center">
        <a href="esgotos.php"><i class="fa-solid fa-home"></i></a>
    </div>
    <h1>Quarentena (status = 4)</h1>
    <h3>Histórias retiradas do ar mas <strong>ATUALIZE A PÁGINA</strong></h3>
    <ul>
        <?php 
            $pCorrigir = "SELECT * FROM story where status = 4 ORDER BY id_story asc";
            foreach($pdo->query($pCorrigir) as $key => $value){
                $id_story = $value['id_story'];
                $nome = $value['nome'];
                echo "<li><a href='quarentena.php?story=". $id_story ."'>$nome</a></li><br>";
            }
        ?>
    </ul>
</body>
</html>