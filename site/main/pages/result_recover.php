<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/result_recover.css">
    <link rel="stylesheet" href="../css/scroll.css?v=1.09">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <title>Recuperação de Senha</title>
</head>
<body>
<?php

    require "includes/values.php";

if(isset($_POST['submit'])){
    require "includes/conexao.php";

    if(!isset($_POST['email'])){
        header("Location: acesso.html");
        exit;
    }

    $sql = "SELECT * FROM user_common WHERE email = '". $_POST['email'] ."'";
    foreach($pdo->query($sql) as $key => $value){
        $check = $value['email'];
    }

    if(isset($check)){
        $sql = "SELECT * FROM user_common WHERE email = '". $_POST['email'] ."'";
        foreach($pdo->query($sql) as $key => $value){
            $password = openssl_decrypt($value['senha'], $ciphering, $decryption_key, $options, $decryption_iv);
            $apelido = $value['apelido'];
        }

        $subject = "Não responda esse email";
        $body = "Olá $apelido, não sabemos se é você tentando recuperar a senha da sua conta. Caso não seja você, recomendamos que logue no site e mude seu email de cadastro, por fins de segurança. Sua senha atual é: $password.";
        $email = $_POST['email'];

        require "includes/envio.php";
        $res = mandarEmail($subject, $body, $email);

        if($res){
            echo "<h1 class='sucess'>Você acaba de receber um email contendo os passos para recuperar sua senha!</h1>";
        }else{
            echo "<h1 class='defeat'>Algo deu errado durante o envio de um email para você, tente novamente!<br>Se os erros continuarem, espere 24 horas antes de tentar novamente</h1>";
        }
            
    }else{
        echo "<h1 class='defeat'>
        Algo deu errado durante o envio de um email para você, tente novamente!
        <br>
        Se os erros continuarem, espere 24 horas antes de tentar novamente</h1>";
    }
}else{
    header("Location: acesso.html");
}

?>
</body>
</html>