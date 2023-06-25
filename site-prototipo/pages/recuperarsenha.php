<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post" action="recuperarsenha.php">
        <h2>Recuperação de Senha</h2><br>
        Seu email :<br>
        <input type="email" name="email"><br>
        <input type="submit" value="Enviar" name="submit">
    </form>

    <?php

        if(isset($_POST['submit'])){
            require "includes/conexao.php";

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
                mandarEmail($subject, $body, $email);
                    
            }else{
                header("Location:error.php?error=15");
            }
        }

    ?>
</body>
</html>