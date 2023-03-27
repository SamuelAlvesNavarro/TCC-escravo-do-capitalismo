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

    include "../conexao.inc";

    $user = $_POST['f_user'];
    $senha = $_POST['f_senha'];

    $sql = "SELECT * FROM tb_cadastro WHERE username = '$user' AND senha = '$senha'";
    $res = mysqli_query($con, $sql);
    $linha = mysqli_affected_rows($con);

    if($linha > 0){
        $num = rand(100000, 900000);
        setcookie("numLogin", $num);
        header("Location:aula39B.php?num1=$num");
    } else {
        echo "ERRO no login<br>";
        echo "<a href='formAula-39.html'>voltar</a>";
    }

    mysqli_close($con);

    ?>

</body>
</html>