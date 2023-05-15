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

    $perfilEntrando = -1;
    $email = $_SESSION['email'];
    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
    foreach($pdo->query($sql) as $key => $value){
        $perfilEntrando = $value['fk_id_profile'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    Lembrete: se foderam <br><br>
    <br><br><br>TODAS AS PÁGINAS DEPOIS DO LOGIN TEM QUE VER SE O USUÁRIO ENTRANDO ESTÁ LOGADO. SE A PÁGINA N TEM DADOS DA PESSOA, TEM QUE MANDAR ELA DEVOLTA PARA O LOGIN. <br><br><br>
    <hr>
    <div class="privdata" id="privdata">
        <br>

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

            echo "<label>Pontos de Leitor:</label>";
            echo "<input type='number' name='pontos_leitor' value='". $pontos_leitor ."' readonly><br>"; 

            echo "<label>Moedas:</label>";
            echo "<input type='number' name='moedas' value='". $moedas ."' readonly><br>";
            
            echo "<input type='submit' value='Enviar'>";

            echo "</form>";
        }
        ?>

        <div class="data">
            Nessa parte deem echo em todos os dados
        </div>
    </div>
    <div class="histprof">
        <br>

        <?php
            //NESSA PARTE, TEM QUE MOSTAR TODAS AS HISTÓRIAS LIGADAS A ESSE PERFIL <strong>COM LINK</strong>
            $sql = "SELECT * FROM story WHERE fk_id_profile = '$perfildono'";
            foreach($pdo->query($sql) as $key => $value){
                echo "<a href='story.php?input_1=".$value['id_story']."'>". $value['nome'] ."</a><br>";
            }

        ?>

    </div>
</body>
</html>