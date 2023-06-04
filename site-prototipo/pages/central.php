<?php
    require "includes/conexao.php";
    require "includes/online.php";
    include "includes/returnUser.php";

    $perfil = -1;
    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);
    if($perfil == -1 || !isset($perfil)) header("Location: error.php");    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Central</title>
</head>
<body id="body" class="">
    <div id="all-menu" class="all-menu disappear">
        <div id="chevron-menu" class="close-menu chevron-phases" onclick="menu_appear()">
            <i class="fa-sharp fa-solid fa-chevron-down"></i>
        </div>
        <div id="menu" class="menu off">
            <div class="lamp">
                <div class="wire">
                    
                </div>
                <i onclick="switchMenu()" class="fa-solid fa-lightbulb"></i>
            </div>
            <div class="lamp-area">
            </div> 
            <div class="content">
                <ul>
                    <li><a href="central.php" target="_blank" rel="noopener noreferrer">Central</a></li>
                    <li><a href="profile.php?profile=<?php echo $perfil?>" target="_blank" rel="noopener noreferrer">Perfil</a></li>
                    <li><a href="loja.php" target="_blank" rel="noopener noreferrer">Loja</a></li>
                    <li><a href="criacao.php" target="_blank" rel="noopener noreferrer">Criação</a></li>
                    <div class="search">
                        <form action="pesquisa.php" method="get">
                            <div class="search-box">
                                <button class="btn-search"><i class="fas fa-search"></i></button>
                                <input type="text" name="busca" class="input-search" placeholder="Pesquisar história........">
                            </div>
                        </form>
                    </div>
                </ul>
                <!--<img src="https://clipart-library.com/images/rcLoyAzKi.png" alt="" srcset="">-->
            </div>
        </div>
    </div>
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
    <a href="loja.php"><button>Loja</button></a>
    <a href="includes/closing_session.php"><button>Sair</button></a>
    <script>
        var body = document.getElementById("body");
        var menu = document.getElementById("menu");
        var all_menu = document.getElementById("all-menu");
        var chevron = document.getElementById("chevron-menu");

        function switchMenu(){
            menu.classList.toggle("on");
            menu.classList.toggle("off");
        }
        function menu_appear(){
            body.classList.toggle("menuOn");
            all_menu.classList.toggle("disappear");
            menu.classList.remove("on");
            menu.classList.remove("off");
            menu.classList.add("off");
            chevron.classList.toggle("chevron-phases");
        }
    </script>
</body>
</html>