<?php
    $cod_erro = $_GET("erro");

    // resumo, vc vai ter que colocar em todos os links de página de erro (no final), isso: ?erro=(codigo que vc escolher)
    // os códigos 4,7,13,42,666 é reservado
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-danger">ERROR: 404</h1>
</body>
</html>