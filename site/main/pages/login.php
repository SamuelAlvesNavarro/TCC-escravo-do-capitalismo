<?php
    require "includes/conexao.php";
    require "includes/enviarErro.php";

    $email = null;
    $senha = null;

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM user_common WHERE email = '$email' and senha = '$senha'";

    $prepare = $pdo->prepare($sql);
    $prepare -> execute();

    if($prepare -> rowCount() > 0){
        require "includes/criasession.php";
        $_SESSION['email'] = $email;
        header("Location: central.php");
    }else{
        $wr = 1;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <script>
        function setNotif(notType){
            localStorage.setItem("AcessoNotificacao", JSON.stringify(notType));
            window.location.href = "acesso.html";
        }
    </script>

    <?php
        if($wr == 1){
            echo "<script>setNotif('errado');</script>";
            header("Lcoation: acesso.html");
        }
    ?>
</body>
</html>