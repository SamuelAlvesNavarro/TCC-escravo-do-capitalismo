<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 40 de PHP - MySQL: Login com sessões</title>
</head>
<body>

    <?php

    session_start();

    if(isset($_SESSION['numLogin'])){
        $n1 = $_GET['num1'];
        $n2 = $_SESSION['numLogin'];
        if($n1 != $n2){
            echo "Login não efetuado";
            exit;
        }
    } else {
        echo "Login não efetuado";
        exit;
    }

    include "../conexao.inc";

    echo "Página inicial<br>";
    echo "Username: " . $_SESSION['username'] . "<br>";

    //session_unset($_SESSION['numLogin']);
    
    session_destroy();

    mysqli_close($con);

    ?>

</body>
</html>