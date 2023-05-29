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

    $sql = "SELECT in_it FROM gadget WHERE id_gadget = $foto and type = 0";
    foreach($pdo->query($sql) as $key => $value){
        $foto = $value['in_it'];
    }
    $sql = "SELECT in_it FROM gadget WHERE id_gadget = $fundo and type = 1";
    foreach($pdo->query($sql) as $key => $value){
        $fundo = $value['in_it'];
    }
    
    if($foto == 0 || !isset($foto))$foto = "background-image: url(../profile-gadgets/pc-profile/new-user.jpg);";
    if($fundo == 0 || !isset($fundo))$fundo = "background-color: rgb(0,0,0);";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css?v=1.01">
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
                <div class="radio" onclick="switchSheet(2)"></div>
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
                            echo "<div id='hidden_form_container' style='display:none;'></div>";
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
                <div class="sheet">
                    <div class="title">
                        <h1>Edição de Perfil</h1>
                        <h3>Clique e troque</h3>
                    </div>
                    <div class="privdata profE" id="privdata">
                        <div class="title subp">
                            <h2>Fotos</h2>
                        </div>
                        <div class="fotos editP">
                            <?php
                                if($perfildono == $perfilEntrando){
                                    $perfil = $perfildono;
                                    $gadget = "SELECT * FROM gadget WHERE type = 0";
                                    foreach($pdo->query($gadget) as $key => $value){
                                        $item = $value['in_it'];
                                        $preco = $value['preco'];
                                        $code = $value['id_gadget'];

                                        $check = "SELECT * FROM compra WHERE fk_id_gadget = '$code' and fk_id_profile = '$perfil'";
                                        $prepare = $pdo->prepare($check);
                                        $prepare->execute();

                                        $rows = $prepare->rowCount();

                                        if($rows == 1){
                                            echo "<div class='card  reveal' onclick='switchP(".$code.")'>
                                                <div class='card-pic' id=".$code." style='$item' value='$preco'></div>
                                            </div>";
                                        } 
                                    }
                                }
                            ?>
                        </div>
                        <div class="title subp">
                            <h2>Fundos</h2>
                        </div>
                        <div class="fundos editP">
                            <?php
                                if($perfildono == $perfilEntrando){
                                    $perfil = $perfildono;
                                    $gadget = "SELECT * FROM gadget WHERE type = 1";
                                    foreach($pdo->query($gadget) as $key => $value){
                                        $item = $value['in_it'];
                                        $preco = $value['preco'];
                                        $code = $value['id_gadget'];

                                        $check = "SELECT * FROM compra WHERE fk_id_gadget = '$code' and fk_id_profile = '$perfil'";
                                        $prepare = $pdo->prepare($check);
                                        $prepare->execute();

                                        $rows = $prepare->rowCount();

                                        if($rows == 1){
                                            echo "<div class='card  reveal' onclick='switchP(".$code.")'>
                                                <div class='card-pic' id=".$code." style='$item' value='$preco'></div>
                                            </div>";
                                        } 
                                    }
                                }
                            ?>
                        </div>
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
        function switchP(n) {
            var theForm, newInput1;
            theForm = document.createElement("form");
            theForm.action = "alter_design.php";
            theForm.method = "post";
            newInput1 = document.createElement("input");
            newInput1.type = "hidden";
            newInput1.name = "gadget";
            newInput1.value = n;
            theForm.appendChild(newInput1);
            document.getElementById("hidden_form_container").appendChild(theForm);
            theForm.submit();
        }

        switchSheet(0);

        </script>';
    }
?>
</body>
</html>