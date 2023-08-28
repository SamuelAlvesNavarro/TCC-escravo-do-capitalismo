<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>

    <meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <link rel="stylesheet" href="../css/cadastro.css?v=1.012345">
    <title>Cadastro</title>
</head>
<body>
    <div class="all" id="all">
        <div class="fixed">
            <div class="chv-left chv" id="chv-left" onclick="toLast()">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="chv-right chv" id="chv-right" onclick="toNext()">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="controls">

<<<<<<< HEAD
            </div>
        </div>
        <div class="prev-cont" id="prev-cont" style="display: none;">

        </div>
        <div class="slides">
            <form action="cadastro_exe.php" method="post">
                <div class="slide">
                   <div class="essInfo info">
                         Muita gente visitará sua conta
                   </div>
                   <div class="inputArea">
                        <div class="prev"></div>
                        <div class="label">Nome:</div>
                        <input type="text" required name="name" id="nome" class='inp-text' maxLength="50" placeholder="Escreva aqui seu nome">
                        <!--<div class="res">
                            mpty
                        </div>-->
                   </div>
                   <div class="pc-info info">
                        Use a tecla Enter e as Flechas para navegar pelo cadastro
                   </div>
                </div>
                <div class="slide">
                    <div class="essInfo info">
                        Seu apelido irá aparecer para outros usuários
                   </div>
                   <div class="inputArea">
                        <div class="prev"></div>
                        <div class="label">Apelido: </div>
                        <input type="text" required name="apelido" id="apelido" class='inp-text' maxLength="50" placeholder="Escreva aqui seu apelido">
                        <!--<div class="res">
                            mpty
                        </div>-->
                   </div>
                   <div class="pc-info info">
                        Use a tecla M para abrir o menu
                  </div>
                </div>
                <div class="slide">
                    <div class="essInfo info">
                        Você receberá e-mails importantes, tenha certeza de escolher o melhor de todos
                   </div>
                   <div class="inputArea">
                        <div class="prev"></div>
                        <div class="label">Seu melhor email: </div>
                        <input type="email" required name="email" id="email" class='inp-text' maxLength="50" placeholder="Escreva aqui seu email">
                        <!--<div class="res">
                            mpty
                        </div>-->
                   </div>
                   <div class="pc-info info">
                        Use a tecla " " para " "
                  </div>
                </div>
                <div class="slide">
                    <div class="essInfo info">
                        " "
                   </div>
                   <div class="inputArea">
                        <div class="prev"></div>
                        <div class="label">Sua senha: </div>
                        <input type="password" required name="senha" id="senha" class='inp-text' maxLength="50" placeholder="Escreva aqui sua senha">
                        <!--<div class="res">
                            mpty
                        </div>-->
                   </div>
                   <div class="pc-info info">
                        Coloque o mouse sobre a senha para vê-la
                  </div>
                </div>
                <div class="slide ">
                    <div class="essInfo info">
                        Se o sangue te atrapalhar, atualize a página
                   </div>
                   <div class="inputArea">
                        <div class="prev"></div>
                        <div class="label">Confirme sua senha: </div>
                        <input type="password" required name="confirmarsenha" id="Confsenha" class='inp-text' maxLength="50" placeholder="Confirmar senha">
                        <!--<div class="res">
                            mpty
                        </div>-->
                   </div>
                   <div class="pc-info info">
                        Use a tecla " " para " "
                  </div>
                </div>
                <div class="slide bt-slide ">
                    <div class="prev"></div>
                    <button id="send" type="submit">Terminar Cadastro</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/cadastro.js?v=1.0123"></script>
</body>
</html>
=======

        if(checkTam($nome, 50) || checkTam($apelido, 50) || checkTam($email, 50) || checkTam($senha, 50) || checkTam($confirmarsenha, 50)){
            sendToError(20);
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

    function checkTam($var, $tam){
        if($var > $tam){
            return true;
        }else{
            return false;
        }
    }

?>
>>>>>>> 047a4839edac458214539ca8e26197753b3cf24c
