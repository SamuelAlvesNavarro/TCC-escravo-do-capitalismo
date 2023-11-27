<?php
    require "includes/conexao.php";
    require "includes/online.php";

    $id_comment = $_GET['id_comment'];

    $sql = "SELECT * FROM comment WHERE id_comment = $id_comment";
    foreach($pdo->query($sql) as $key => $value){
        $comment = $value['text'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        body{
            padding: 20px;
        }
    </style>
</head>
<body data-bs-theme="dark">
    <h1>Comentário: </h1>
    <br>
    <p class="container text-center"><?php echo $comment; ?></p>
</body>
</html>