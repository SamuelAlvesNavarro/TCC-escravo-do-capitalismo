<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/result_recover.css">
    <title>Recuperação de Senha</title>
</head>
<body>
<?php

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
            $password = $value['senha'];
            $apelido = $value['apelido'];
        }

        $subject = "Não responda esse email";
        $body = "Olá $apelido, não sabemos se é você tentando recuperar a senha da sua conta. Se não for, logue no site e mude sua senha, visando segurança. Se for você, aqui está: $password
        De todo o modo, recomendamos que você troque sua senha";
        $email = $_POST['email'];

        require "includes/envio.php";
        $res = mandarEmail($subject, $body, $email);

        if($res){
            echo "<h1 class='sucess'>Você acaba de receber um email contendo sua senha!</h1>";
        }else{
            echo "<h1 class='defeat'>Algo deu errado durante o envio de um email para você, tente novamente!<br>Se os erros continuarem, espere 24 horas antes de tentar novamente</h1>";
        }
            
    }else{
        echo "<h1 class='defeat'>Algo deu errado durante o envio de um email para você, tente novamente!<br>Se os erros continuarem, espere 24 horas antes de tentar novamente</h1>";
    }
}else{
    header("Location: acesso.html");
}

?>
</body>
</html>