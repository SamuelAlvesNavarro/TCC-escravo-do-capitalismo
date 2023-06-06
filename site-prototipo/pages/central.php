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
    <link rel="stylesheet" href="../css/central.css">
    <title>Central</title>
</head>
<body>
    <div id="all-menu" class="all_menu disappear">
        <div id="chevron-menu" class="close-menu chevron-phases" onclick="menu_appear()">
            <i class="fa-sharp fa-solid fa-xmark"></i>
        </div>
        <div id="menu" class="menu off">
            <div class="lamp">
                <div class="wire">
                    
                </div>
                <i onclick="switchMenu(1)" class="fa-solid fa-lightbulb"></i>
            </div>
            <div class="lamp-area" onclick="switchMenu(2)">
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
                                <input required type="text" name="busca" class="input-search" placeholder="Pesquisar história........">
                            </div>
                        </form>
                    </div>
                </ul>
                <!--<img src="https://clipart-library.com/images/rcLoyAzKi.png" alt="" srcset="">-->
            </div>
        </div>
    </div>

    <div class="header-all">
        <div class="header">
            <div class="to to-store">
                <div class="portal" onclick="aloja()">
                    <h2>Loja</h2>
                </div>
            </div>
            <div class="central-menu">

                <div class="logo-pic">
                    <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
                </div>
                <div class="mode-switch">
                    <div class="piece">
                        <i id="mode" class="far fa-sun transi"></i>
                    </div>
                </div>
                <div class="user-op">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="banner-title">
                    <h1>Histórias Assombrosas<h1>
                </div>
            </div>
            <div class="to to-search">
                <div class="portal" onclick="apesquisa()">
                    <h2>Pesquisa</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="rest">
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
    </div>
    

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
        $showStory = "SELECT * FROM story ORDER BY id_story ASC LIMIT 5";
        foreach($pdo->query($showStory) as $key => $value){
            $id_story = $value['id_story'];
            $nome = $value['nome'];
            echo "<a href='story.php?input_1=". $id_story ."'>$nome</a><br>";
        }
    ?>
    <a href="loja.php"><button>Loja</button></a>
    <a href="includes/closing_session.php"><button>Sair</button></a>
    <button onclick="menu_appear()">Menu</button>
    <script src="../js/menu.js"></script>
    <script src="../js/central.js"></script>
</body>
</html>