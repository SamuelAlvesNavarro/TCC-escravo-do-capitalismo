<?php
        require "includes/conexao.php";
        $nome = null;
        $email = null;
        $senha = null;
        $confirmarsenha = null;

        $nome = $_POST["name"];
        $apelido = $_POST["apelido"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $confirmarsenha = $_POST["confirmarsenha"];

        if($senha != $confirmarsenha){
            header("Location: error.php?erro=2");
        }else{

            $sql = "SELECT * FROM user_common WHERE email = '$email'";

            if($pdo->query($sql)->rowCount() > 0){
                header("Location: error.php?erro=1");
            } else{
                $sql = "INSERT INTO profile(foto) values('0')";
                
                $prepare = $pdo->prepare($sql);
                $prepare->execute();

                $sql = 'SELECT * FROM profile';
                foreach ($pdo->query($sql) as $key => $value) {
                    $fk_profile = $value['id_profile'];
                }
                
                $sql = "INSERT INTO user_common(fk_id_profile, nome, email, senha, apelido) values(?, ?, ?, ?, ?)";
                $prepare = $pdo->prepare($sql);

                $prepare -> bindParam(1, $fk_profile);
                $prepare -> bindParam(2, $nome);
                $prepare -> bindParam(3, $email);
                $prepare -> bindParam(4, $senha);
                $prepare -> bindParam(5, $apelido);
                
                $prepare->execute();
                
                if($prepare->rowCount() <= 0){
                    header("Location: error.php?erro=3");
                }else{
                    session_cache_expire(720);
                    session_start();
                    $_SESSION['email'] = $email;
                    header("Location:central.php");
                }
            }
        }
?>