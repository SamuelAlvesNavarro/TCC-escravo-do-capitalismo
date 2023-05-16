<?php
    require "includes/conexao.php";
    require "includes/online.php";
    include "includes/returnUserId.php";

    $perfil = -1;
    $email = $_SESSION['email'];

    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
    foreach($pdo->query($sql) as $key => $value){
        $perfil = $value['fk_id_profile'];
    }

    if($perfil == -1 || !isset($perfil)) header("Location: error.php");

    echo returnProfileId();
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central</title>
</head>
<body>
    Lembrete: entrar na central significa que a pessoa já logou, logo, de alguma maneira, os dados da pessoa já tem que "estar aqui" <br><br>
    <br><br><br>TODAS AS PÁGINAS DEPOIS DO LOGIN TEM QUE VER SE O USUÁRIO ENTRANDO ESTÁ LOGADO. SE A PÁGINA N TEM DADOS DA PESSOA, TEM QUE MANDAR ELA DEVOLTA PARA O LOGIN. <br><br><br>
    <hr>

    <a href="profile.php?profile=<?php echo $perfil?>"><button>Entar no Perfil</button></a><br><br>

    <label for="" class="tipor">Buscas</label>
    <select name="" id="" class="tirank">
        <option value="" class="mel">Histórias +</option>
        <option value="" class="mel">Histórias -</option>
    </select>
    <div class="rank" id="rank">
        
    </div>
    <a href="criacao.php">Ir para a criação de histórias</a>
    <br><br>
    <form method="get" action="pesquisa.php">
        <input type="text" name="busca" id="busca">
        <input type="submit" value="Buscar por nome" class="bpnom"><br><br>
    </form>

    <?php
        //php da chamada da história e o link para ela
        echo "Histórias mais bem avaliadas<br>";
        $showStory = "SELECT * FROM story ORDER BY rating DESC LIMIT 5";
        foreach($pdo->query($showStory) as $key => $value){
            $id_story = $value['id_story'];
            $nome = $value['nome'];
            echo "<a href='story.php?input_1=". $id_story ."'>$nome</a><br>";
        }
        echo "<br>";
        echo "Histórias mais velhas<br>";
        $showStory = "SELECT * FROM story ORDER BY id_story DESC LIMIT 5";
        foreach($pdo->query($showStory) as $key => $value){
            $id_story = $value['id_story'];
            $nome = $value['nome'];
            echo "<a href='story.php?input_1=". $id_story ."'>$nome</a><br>";
        }
    ?>
</body>
</html>