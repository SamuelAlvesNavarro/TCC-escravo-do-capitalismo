<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post" action="recuperar.php">
        <h2>Recuperação de Senha</h2><br>
        Seu email :<br>
        <input type="email" name="email"><br>
        <input type="submit" value="Enviar" name="submit">
    </form>

    <?
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
                $url = "https://script.google.com/macros/s/AKfycbxju8ZwCcBEeOJEgfQ2W5-gVtOr1RIaBNlFg2A1XkOoq4X2BuWHs5MN3bSpsI7TNgU/exec";
                    $ch = curl_init($url);
                    curl_setopt_array($ch, [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_POSTFIELDS => http_build_query([
                        "recipient" => $_POST['email'],
                        "subject"   => "Não responda esse email",
                        "body"      => "Olá $apelido, não sabemos se é você tentando recuperar a senha da sua conta. Se não for, logue no site e mude sua senha, visando segurança. Se for você, aqui está: $password
                        De todo o modo recomendamos que você troque sua senha"
                    ])
                    ]);
                    $result = curl_exec($ch);
                    if($result){
                        echo "Mensagem enviada para seu gmail. Cheque seu Spam, pois o email pode ter caído lá<br>";
                        echo "Volte para o acesso para <a href='acesso.html'>logar</a> novamente com sua senha";
                    }else{
                        header("Location: error.php?error=18");
                    }
                    
            }else{
                header("Location:error.php?error=15");
            }
        }
    ?>
</body>
</html>