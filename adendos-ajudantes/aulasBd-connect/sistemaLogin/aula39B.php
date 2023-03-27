<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 39 de PHP - MySQL: Login</title>
</head>
<body>

    <?php

    if(isset($_COOKIE['numLogin'])){
        $n1 = $_GET['num1'];
        $n2 = $_COOKIE['numLogin'];
        if($n1 != $n2){
            echo "Login não efetuado";
            exit;
        }
    } else {
        echo "Login não efetuado";
        exit;
    }

    include "../conexao.inc";

    echo "Página inicial";

    mysqli_close($con);

    ?>

</body>
</html>