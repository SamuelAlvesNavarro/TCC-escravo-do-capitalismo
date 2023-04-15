<?php
        $pdo = new PDO('mysql:host=localhost;dbname=id20545858_pi', 'id20545858_samuel', 'Agx3((dO5ze*n-]Y');
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
            echo "senha não confirmada";
        }else{

            $sql = "SELECT * FROM user_common WHERE email = '$email'";

            if($pdo->query($sql)->rowCount() > 0){
                echo "Error: Email existente!";
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
                
                echo $prepare->rowCount();
                
                if($prepare->rowCount() <= 0){
                    echo "deu erro porra";
                }else{
                    session_start();
                    $_SESSION['email'] = $email;
                    header("Location:central.php");
                }
            }
        }
?>