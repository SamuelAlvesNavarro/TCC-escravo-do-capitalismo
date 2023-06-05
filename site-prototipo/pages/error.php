<?php   
    require 'includes/conexao.php';

    $erro = $_GET['erro']; 
    $sql = "SELECT * FROM error WHERE cod_error='$erro'";
    foreach($pdo->query($sql) as $key => $value){
        $id_error = $value['id_error'];
        $cod_error = $value['cod_error'];
        $desc = $value['description'];
    }

    // resumo, vc vai ter que colocar em todos os links de página de erro (no final), isso: ?erro=(codigo que vc escolher)
    // os códigos 4,7,13,42,666 é reservado 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
</head>
<body>

    <?php
    echo "
    <h1 class='text-danger'>ERROR: ". $value['cod_error'] ."</h1>

    <div class='desc-erro'>
     ". $value['description'] ."
    </div>"
    ?>
</body>
</html>