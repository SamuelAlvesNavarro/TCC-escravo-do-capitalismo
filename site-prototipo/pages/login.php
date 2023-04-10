<?php
    $pdo = new PDO('mysql:host=localhost;dbname=id20545858_pi', 'id20545858_samuel', 'Agx3((dO5ze*n-]Y');
    $email = null;
    $senha = null;

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM user_common WHERE email = '$email' and senha = '$senha'";

    $prepare = $pdo->prepare($sql);
    $prepare -> execute();
    $checkEmailCadastrado = $prepare -> rowCount();

    if(isset($checkEmailCadastrado)){
        if($checkEmailCadastrado > 0){
            $num = rand(10000, 900000);
            $_COOKIE['email'] = $email;
            setcookie("numLogin", $num);
            header("Location:central.php?num=$num");

            echo "<a href=central.php>Central<\a>";
        }
    }else{
        echo "Error: login não efetuado";
    }
?>