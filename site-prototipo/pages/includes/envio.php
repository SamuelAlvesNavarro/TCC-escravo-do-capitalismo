<?php

    function mandarEmail($subject, $body, $email){

        $url = "https://script.google.com/macros/s/AKfycby6LrnuCEJ7cVJdk3Z3qhsUyemzRO93J7zg9Qvx4qI/dev";
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_POSTFIELDS => http_build_query([
                    "recipient" => $email,
                    "subject"   => "$subject",
                    "body"      => "$body"
                ])
            
            ]
        );

        $result = curl_exec($ch);
        echo $result;
        if($result){
            echo "Mensagem enviada para seu gmail. Cheque seu Spam, pois o email pode ter caído lá<br>";
            echo "Volte para o acesso para <a href='acesso.html'>logar</a> novamente com sua senha";
        }else{
            header("Location: error.php?error=18");
        }
    }
?>