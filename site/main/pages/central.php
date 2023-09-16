<?php
    require "includes/conexao.php";
    require "includes/online.php";
    include "includes/returnUser.php";

    $perfil = -1;
    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);
    if($perfil == -1 || !isset($perfil)){
        header("Location: acesso.html");  
        exit;
    }
    
    $sql = "SELECT * FROM user_common WHERE fk_id_profile = $perfil";
    foreach($pdo->query($sql) as $key => $value){
        $apelido = $value['apelido'];
        $id_user = $value['id_user'];
        $moedas = $value['moedas'];
        $pontos = $value['pontos_leitor'];
    }

    $topUsers = array();
    $topIds = array();
    $i =  0;
    $sql = "SELECT * FROM user_common order by pontos_leitor desc, moedas desc Limit 3";
    foreach($pdo->query($sql) as $key => $value){
        $topUsers[$i] = $value['apelido'];
        $topIds[$i] = $value['fk_id_profile'];
        $i++;
    }

    for($z = 0; $z < 3; $z++){
        if(!isset($topUsers[$z])) $topUsers[$z] = "Ninguém";
        if(!isset($topIds[$z])) $topIds[$z] = 0;
    }
    
    /* PEGANDO AS COISAS DO PERFIL */
    
    $sql = "SELECT * FROM profile WHERE id_profile = $perfil";
    foreach($pdo->query($sql) as $key => $value){
        $foto = $value['foto'];
    }
    $sql = "SELECT in_it FROM gadget WHERE id_gadget = $foto and type = 0";
    foreach($pdo->query($sql) as $key => $value){
        $foto = $value['in_it'];
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/central.css?v=1.01">
    <link rel="stylesheet" href="../css/scroll.css?v=1.09">
    <title>Central</title>
    <style>
        .deco{
            z-index: 1000;
            position: fixed;
            bottom: -60px;
            left: 10px;
        }
        .historito-svg{
            font-size: 150px;
            color: black;
            opacity: 1;
            border: none;
        }
    </style>
</head>
<body>
    <?php 
        require "includes/menu.php";
    ?>
    <div class="header-phone">
        <svg class="historito" id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
        <i class="mode far fa-sun transi"></i>
        <a href="pesquisa.php?busca=novo"><i class="search-phone fa-solid fa-search"></i></a>
        <i onclick="menu_appear()" class="fa-solid fa-bars"></i>
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
                        <i class="mode far fa-sun transi"></i>
                    </div>
                </div>
                <div class="user-op">
                    <a href="profile.php?profile=<?php echo $perfil?>">
                        <div class="pcpic" style='<?php echo $foto ?>'>

                        </div>
                    </a>
                </div>
                <div class="pencil-op">
                    <a href="writerHub.php"><i class="fa-solid fa-pencil"></i></a>
                </div>
                <div class="banner-title">
                    <h1>Histórias Assombrosas</h1>
                    
                    <form action="pesquisa.php" method="get">
                        <div id="search-div" class="search">
                            <input id="search-input" class="search-bar" type="text" name="busca" id="" placeholder="Pesquise e encontre......">
                            <button class="bt-search"><i class="fas fa-search"></i></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div id="main" class="main">
        <div class="main-over">
            <div class="f-col col">
                <div class="section presentation">
                    <h2>Olá, <?php echo $apelido?></h2>
                </div>
                <div class="section bhis">
                    <h1>Histórias</h1>
                    <div class="selects">
                        <div class="col1 sel-col">
                            <select name="" id="ageRank" class="ageRank select">
                                <option value="dir" class="mel">Novas histórias</option>
                                <option value="inv" class="mel">Histórias mais velhas</option>
                            </select>
                            <div class="results-age results">
                                <?php
                                    $i = 1;
                                    $showStory = "SELECT * FROM story where status = 3 ORDER BY id_story DESC";
                                    foreach($pdo->query($showStory) as $key => $value){
                                        $id_story = $value['id_story'];
                                        $nome = $value['nome'];
                                        echo "<a class='ageRankA' href='story.php?story=". $id_story ."' style='order:".$i."'>$nome</a>";
                                        $i++;
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col2 sel-col">
                            <select name="" id="bestRank" class="bestRank select">
                                <option value="dir" class="mel">Histórias mais bem avaliadas</option>
                                <option value="inv" class="mel">Histórias menos bem avaliadas</option>
                            </select>
                            <div class="results-best results">
                                <?php
                                    $i = 1;
                                    $showStory = "SELECT * FROM story where status = 3 ORDER BY rating DESC";
                                    foreach($pdo->query($showStory) as $key => $value){
                                        $id_story = $value['id_story'];
                                        $nome = $value['nome'];
                                        echo "<a class='bestRankA' href='story.php?story=". $id_story ."' style='order:".$i."'>$nome</a>";
                                        $i++;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="s-col col">
                <div class="section data">
                    <h2>Dados</h2>
                    <ul class="dados">
                        <li><?php echo $moedas; ?>  <i class="fa-solid fa-coins"></i></li>
                        <li><?php echo $pontos; ?>  <i class="fa-solid fa-book"></i></li>
                    </ul>
                </div>
                <div class="section events">
                    <h2>Eventos</h2>
                    <ul class="dados">
                        <li>Venda de itens de celebridades</li>
                    </ul>
                </div>
            </div>
            <div class="rank section">
                <h1>Top Leitores</h1>
                <div class="ranks-container">
                    <div class="top top1 ld1">
                        <div class="line-div ">
                            <div class="line line1"></div>
                        </div>
                        <div class="name name1">
                            <a class="name1a" href="profile.php?profile=<?php echo $topIds[0]; ?>"><?php echo $topUsers[0];?></a>
                        </div>
                    </div>
                    <div class="top top1 ld2">
                        <div class="line-div ">
                            <div class="line line2"></div>
                        </div>
                        <div class="name name2">
                            <a class="name2a" href="profile.php?profile=<?php echo $topIds[1]; ?>"><?php echo $topUsers[1];?></a>
                        </div>
                    </div>
                    <div class="top top1 ld3">
                        <div class="line-div">
                            <div class="line line3"></div>
                        </div>
                        <div class="name name3">
                            <a class="name3a" href="profile.php?profile=<?php echo $topIds[2]; ?>"><?php echo $topUsers[2];?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/menu.js?version=1.01"></script>
    <script src="../js/central.js?version=1.02"></script>

    <?php
        $pdo = '';
    ?>
</body>
</html>