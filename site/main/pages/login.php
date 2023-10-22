<?php
    require "includes/conexao.php";
    require "includes/enviarErro.php";
    require "includes/values.php";

    $email = null;
    $senha = null;

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM user_common WHERE email = '$email' and senha = '".openssl_encrypt($senha, $ciphering, $encryption_key, $options, $encryption_iv)."'";

    $prepare = $pdo->prepare($sql);
    $prepare -> execute();

    function checkAllReport(){
        global $pdo;

        $sql = "delete from report_story where fk_id_reported_story = 0 and fk_id_reporter = 0";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "delete from report_comment where fk_id_reported = 0 and fk_id_reporter = 0";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "delete from report_profile where fk_id_reported = 0 and fk_id_reporter = 0";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        $sql = "delete from report_profile where fk_id_reported = 0 and fk_id_reporter = 666";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();
    }
    
    checkAllReport();
    
    if($prepare -> rowCount() > 0){
        require "includes/criasession.php";
        $_SESSION['email'] = $email;
        header("Location: central.php");
    }else{
        $wr = 1;
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
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