<?php
    require "../../site-prototipo/pages/includes/conexao.php";

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
        $url = "https://script.google.com/macros/s/AKfycbyyK6zGK6Z6GapHt-l3fiWxCQGWT5lYT9SZZ-TVJLSKK6kL2I2LDIRyiKgRtbWzWL62mg/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POSTFIELDS => http_build_query([
                "recipient" => $_POST['email'],
                "subject"   => "Não responda esse email",
                "body"      => "Olá $apelido, não sabemos se é você tentando recuperar a senha da sua conta. Se não for, logue no site e mude sua senha, visando segurança. Se for você, aqui está: " . $password
            ])
            ]);
            $result = curl_exec($ch);
            echo $result;
            /*header("Location: acesso.html");*/
            
    }else{
        header("Location:error.php?error=15");
    }
?>