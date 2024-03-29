<?php
        require "includes/conexao.php";
        require "includes/enviarErro.php";
        require "includes/values.php";

        function valido($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }
        
        $nome = null;
        $email = null;
        $senha = null;
        $confirmarsenha = null;

        $nome = trim($_POST["name"]);
        $apelido = trim($_POST["apelido"]);
        $email = trim($_POST["email"]);
        $senha = trim($_POST["senha"]);

        if(strlen($senha) > 20){
            sendToError(42);
            exit;
        }
        if(strlen($apelido) > 15){
            sendToError(42);
            exit;
        }
        if(strlen($nome) > 50){
            sendToError(42);
            exit;
        }
        if(strlen($email) > 50){
            sendToError(42);
            exit;
        }

        $confirmarsenha = trim($_POST["confirmarsenha"]);

        
        if(!valido($email)){
            sendToError(21);
            exit;
        }

        if(checkBan($email, $pdo)){
            sendToError(19);
            exit;
        }
        if(checkMod($email, $pdo)){
            sendToError(19);
            exit;
        }

        if($senha != $confirmarsenha){
            sendToError(2);
            exit;
            
        }else{

            $sql = "SELECT * FROM user_common WHERE email = '$email'";

            if($pdo->query($sql)->rowCount() > 0){
                sendToError(1);
                exit;
            } else{
                $sql = "INSERT INTO profile(foto, fundoPerfil) values('1', '2')";
                
                $prepare = $pdo->prepare($sql);
                $prepare->execute();

                $sql = 'SELECT max(id_profile) as prof FROM profile';
                foreach ($pdo->query($sql) as $key => $value) {
                    $fk_profile = $value['prof'];
                }
                
                $sql = "INSERT INTO user_common(fk_id_profile, nome, email, senha, apelido) values(?, ?, ?, ?, ?)";
                $prepare = $pdo->prepare($sql);

                $senha = openssl_encrypt($senha, $ciphering, $encryption_key, $options, $encryption_iv);

                if(strlen($senha) > 200){
                    sendToError(42);
                    exit;
                }

                $prepare -> bindParam(1, $fk_profile);
                $prepare -> bindParam(2, $nome);
                $prepare -> bindParam(3, $email);
                $prepare -> bindParam(4, $senha);
                $prepare -> bindParam(5, $apelido);
                
                $prepare->execute();
                
                if($prepare->rowCount() <= 0){
                    sendToError(3);
                    exit;
                }else{

                    $sql = "INSERT INTO compra values($fk_profile, 1, now()); INSERT INTO compra values($fk_profile, 2, now());";
                    $prepare = $pdo->prepare($sql);
                    $prepare->execute();

                    require "includes/criasession.php";
                    $_SESSION['email'] = $email;
                   

                    include_once "includes/eventos.php";
                    evento(1);
                    
                    $pdo = '';
                    header("Location:central.php");

                    
                }
            }
        }

    function checkBan($email, $pdo){

        $sql = "SELECT * FROM ban WHERE user_email = '$email'";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        if($prepare->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    function checkMod($email, $pdo){

        $sql = "SELECT email FROM mods WHERE email = '$email'";
        $prepare = $pdo->prepare($sql);
        $prepare->execute();

        if($prepare->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

?>