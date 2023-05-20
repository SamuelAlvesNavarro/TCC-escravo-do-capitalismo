<?php
    require "includes/conexao.php";
    require "includes/online.php";

    $perfildono = -1;
    $perfildono = $_GET['profile'];
    $sql = "SELECT * FROM user_common WHERE fk_id_profile = '$perfildono'";
    foreach($pdo->query($sql) as $key => $value){
        $nome = $value['nome'];
        $email = $value['email'];
        $senha = $value['senha'];
        $apelido = $value['apelido'];
        $pontos_leitor = $value['pontos_leitor'];
        $moedas = $value['moedas'];
    }
    
    $sql = "SELECT * FROM profile WHERE id_profile = $perfildono";
    foreach($pdo->query($sql) as $key => $value){
        $foto = $value['foto'];
        $fundo = $value['fundoPerfil'];
    }

    $perfilEntrando = -1;
    $email = $_SESSION['email'];
    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
    foreach($pdo->query($sql) as $key => $value){
        $perfilEntrando = $value['fk_id_profile'];
    }

    if($perfildono == -1 || $perfilEntrando == -1) header("Location: error.php");

    if($fundo == 0)$fundo = "background-color: rgb(0, 0, 0);";
    if($fundo == 1)$fundo = "background-image: url(../profile-gadgets/bc-profile/red.jpg);";

    if($foto == 0)$foto = "background-image: url(../profile-gadgets/pc-profile/new-user.jpg);";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <title>Perfil</title>
</head>
<body>
    <div class="deco">
        <!-- deco -->
    </div>
    <div class="all">
        <div class="header">
            <div class="picture-container" style='<?php echo $fundo ?>'>
                <div class="picture" style='<?php echo $foto ?>'>

                </div>
            </div>
        </div>
        <div class="main">
        <?php
            if($perfildono == $perfilEntrando){
                echo '<div class="slider-controller" id="slider-controller">
                <div class="radio" onclick="switchSheet(0)"></div>
                <div class="radio" onclick="switchSheet(1)"></div>
                </div>';
            }
        ?>
            <div class="sheet-container">
                <div class="hs-sheet sheet sheet-appear">
                    <div class="container">
                        <div class="about">
                            <h2>Sobre</h2>
                            <div class="points">
                                <?php echo "<span class='pointsh4'>$pontos_leitor</span>"; ?><i class="fa-solid fa-book"></i>
                            </div>
                            <div class="points">
                                <?php echo "<span class='pointsh4'>$moedas</span>"; ?><i class="fa-solid fa-coins"></i>
                            </div>
                        </div>
                        <div class="histprof">
                            <div class="title">
                                <h1>Histórias escritas por <?php echo $apelido; ?>:</h1>
                            </div>
                            <div class="content">
                                <?php
                                    $i = 0;
                                    $sql = "SELECT * FROM story WHERE fk_id_profile = '$perfildono'";
                                    foreach($pdo->query($sql) as $key => $value){
                                        $i++;
                                        echo "

                                        <a href='story.php?input_1=".$value['id_story']."'>
                                            <div class='story-link'>
                                                ". $value['nome']."
                                            </div>
                                        </a>

                                        ";
                                    }
                                    
                                    if($i == 0) echo "<div class='no-stories'>Esse usuário não escreveu nenhuma história até o momento</div>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sheet">
                    <div class="title">
                        <h1>Edição de Dados</h1>
                        <h3>Depois de enviar seus dados editados, você terá de logar novamente.</h3>
                    </div>
                    <div class="privdata" id="privdata">
                        <?php
                        if($perfildono == $perfilEntrando){
                            echo "<form method='post' action='editar_usuario.php'>";

                            echo "<label>Apelido:</label>";
                            echo "<input type='text' name='apelido' value='". $apelido ."' required><br>";
                            
                            echo "<label>Nome:</label>";
                            echo "<input type='text' name='nome' value='". $nome ."' required><br>"; 

                            echo "<label>Email:</label>";
                            echo "<input type='email' name='email' value='". $email ."' required><br>"; 

                            echo "<label>Senha:</label>";
                            echo "<input type='password' name='senha' value='". $senha ."' required><br>"; 

                            echo "<input class='submit-bt' type='submit' value='Enviar'>";

                            echo "</form>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="../js/profile.js"></script>
<?php
    if($perfildono == $perfilEntrando){

        echo '<script> 
        
        var sheets = document.getElementsByClassName("sheet");
        var balls = document.getElementsByClassName("radio");

        function switchSheet(n){
            for(var i = 0; i < sheets.length; i++){
                if(i == n){
                     sheets[i].classList.add("sheet-appear");
                     balls[i].classList.add("ball-active");
                }
                else{
                    sheets[i].classList.remove("sheet-appear");
                    balls[i].classList.remove("ball-active");
                }
            }
        } 

        switchSheet(0);

        </script>';
    }
?>
</body>
</html>