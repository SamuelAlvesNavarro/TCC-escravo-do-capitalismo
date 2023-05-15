<?php
    require "includes/conexao.php";
    require "includes/online.php";

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
            echo "<form>";

            

            echo "</form>";
        ?>

        <div class="data">
            Nessa parte deem echo em todos os dados
        </div>
    </div>
    <div class="histprof">
        <br>
        NESSA PARTE, TEM QUE MOSTAR TODAS AS HISTÓRIAS LIGADAS A ESSE PERFIL <strong>COM LINK</strong>
    </div>
</body>
</html>