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
    
    /* PEGANDO AS COISAS DO PERFIL */
    
    $sql = "SELECT * FROM profile WHERE id_profile = $perfil";
    foreach($pdo->query($sql) as $key => $value){
        $foto = $value['foto'];
    }
    $sql = "SELECT in_it FROM gadget WHERE id_gadget = $foto and type = 0";
    foreach($pdo->query($sql) as $key => $value){
        $foto = $value['in_it'];
    }


    /* PEGANDO TOP */

    $topProfs = array();
    $topUsers = array();
    $i =  0;
    $sql = "SELECT * FROM user_common order by pontos_leitor desc, moedas desc Limit 3";
    foreach($pdo->query($sql) as $key => $value){
        $topProfs[$i] = $value['fk_id_profile'];
        $topUsers[$i] = $value['apelido'];
        $i++;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/scroll.css?v=1.01">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/variable.css?v=1.01">
    <link rel="stylesheet" href="../css/central2.css?v=1.012<?php echo rand(0,1000)?>">
    <title>Central</title>
</head>
<body>
    <?php
        require "includes/menu.php";
    ?>
    <div class="header">
        <div class="menu-acess" onclick="menu_appear()">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="user-op">
            <a href="profile.php?profile=<?php echo $perfil?>">
                <div class="pcpic" style='<?php echo $foto ?>'>

                </div>
            </a>
        </div>
        <div class="historito">
            <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
        </div>
    </div>
    <div class="all" id="all">
        <div class="banner">
            <div class="controls">
                <div class="dark">
                    <i class="fa-solid fa-sun mode"></i>
                </div>
                <div class="others">
                    <a href="writerHub.php"><i class="fa-solid fa-pencil"></i></a>
                </div>
            </div>
            <div class="title-banner">
                <span class="span-title">Histórias</span><br>Assombrosas
            </div>
            <div class="search-bar">
                <form action="pesquisa.php" method="get">
                    <div id="search-div" class="search">
                        <input id="search-input" class="search-bar" type="text" name="busca" id="" placeholder="Pesquise e encontre......">
                        <button class="bt-search"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="main">
            <div class="main-in">
                <div class="toggle">
                    <div class="togs">
                        <div class="oop" onclick="changeOop(0)">
                            Histórias
                        </div>
                        <div class="oop" onclick="changeOop(1)">
                            Eventos
                        </div>
                        <div class="oop" onclick="changeOop(2)">
                            Rankings
                        </div>
                    </div>
                </div>
                <div class="page-container">
                    <div class="page history-page">
                        <div class="history-menu">
                            <div class="title">
                                <div class="pp">
                                    <h1>Histórias</h1>
                                    <div class="expl">
                                        Confira as histórias do site:
                                    </div>
                                </div>
                                <div class="select-container">
                                    <select name="type" id="type-s" onchange="valC()">
                                        <option value="newer">Mais novas</option>
                                        <option value="older">Mais velhas</option>
                                        <option value="bigS">Maiores Notas</option>
                                        <option value="smallS">Menores Notas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="stories">
                    <?php

                        $titulos = array();
                        $i = 0;

                       

                            $sql = "SELECT * FROM story where status = 3 order by id_story asc ";
                            $prepare = $pdo->prepare($sql);
                            $prepare->execute();

                            foreach($pdo->query($sql) as $key => $value){
                                $titulos[$i][0] = $value["nome"];
                                $titulos[$i][1] = $value["id_story"];
                                $titulos[$i][2] = $value['rating'];
                                
                                $sql = "SELECT id_page FROM page where type = 1 and fk_id_story = ".$titulos[$i][1];
                                $prepare = $pdo->prepare($sql);
                                $prepare->execute();

                                if($prepare->rowCount() != 0){

                                    foreach($pdo->query($sql) as $key => $value){
                                        $page = $value['id_page'];

                                        $sql = "select path from images where fk_id_page = $page and fundo = 1";
                                        
                                        $prepare = $pdo->prepare($sql);
                                        $prepare->execute();

                                        if($prepare->rowCount() != 0){

                                            foreach($pdo->query($sql) as $key => $value){
                                                $titulos[$i][3] = "url(".$value['path'].")";
                                            }

                                        }else{

                                            $titulos[$i][3] = "linear-gradient(rgb(50,50,50), rgb(0,0,0));";
                                        }
                                    }

                                }else{

                                    $titulos[$i][3] = "linear-gradient(rgb(50,50,50), rgb(0,0,0));";
                                }

                                $i++;
                            }

                            $key_values = array_column($titulos, 1); 
                            array_multisort($key_values, SORT_DESC, $titulos);

                                echo "<div class='allStories' id='allStories'>";
                            
                                for($i = 0; $i < sizeof($titulos); $i++){

                                    if($i == 10)break;

                                    $check = "SELECT * FROM question_user, question, story WHERE question_user.fk_id_profile = $perfil and story.id_story = question.fk_id_story and question.id_question = question_user.fk_id_question and story.id_story = ".$titulos[$i][1];
                                    $prepare = $pdo->prepare($check);
                                    $prepare->execute();

                                    if($prepare->rowCount() == 0){

                                        $check = "SELECT * FROM error_user WHERE fk_id_profile = $perfil and fk_id_story = ".$titulos[$i][1];
                                        $prepare = $pdo->prepare($check);
                                        $prepare->execute();

                                        if($prepare->rowCount() == 0){

                                            $titulos[$i][4] = "<i class='fa-brands fa-readme readqm readme'></i>";
                                            
                                        }
                                        else{
                                            $titulos[$i][4] = "<i class='fa-solid fa-xmark readqm wrong'></i>";
                                        }
                                    }
                                    else{

                                        $titulos[$i][4] = "<i class='fa-solid fa-check readqm read'></i>";

                                        $check = "SELECT * FROM score WHERE fk_id_story = ".$titulos[$i][1]." and fk_id_profile = ".$perfil;
                                        $prepare = $pdo->prepare($check);
                                        $prepare->execute();

                                        if($prepare->rowCount() == 0){

                                            $titulos[$i][4] = "<i class='fa-solid fa-check readqm read'></i>";
                                            
                                        }
                                        else{
                                            $titulos[$i][4] = "<i class='fa-solid readqm fa-star'></i>";
                                        }
                                    }

                                    echo "
                                        <div class='story' score='".$titulos[$i][2]."'>
                                            <div class='action' onclick='story(".$titulos[$i][1].")'>

                                                <div class='square' style='background-image: ". $titulos[$i][3]."'>
                                                    <h3>". $titulos[$i][0] ."</h3>
                                                        ".$titulos[$i][4].
                                                "</div>
                                            
                                            </div>
                                            <div class='second-way' style='background-image: ". $titulos[$i][3]."'>
                                                <a href='story.php?story=".$titulos[$i][1]."'><button>". $titulos[$i][0] ."</button></a>
                                            </div>
                                        </div>
                                        ";

                                }  

                                echo "</div>";
                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="page events-page">
                        <div class="container-eventos">

                                <?php
                                
                                    $evento = "select * from evento where active = 1";
                                    $prepare = $pdo->prepare($sql);
                                    $prepare->execute();

                                    foreach($pdo->query($evento) as $key => $value):

                                ?>

                            <div class="evento">
                                <div class="title-evento">
                                    <div class="bar-full"></div>
                                    <div class="title-full">
                                        <h1><?php echo $value['titulo']; ?></h1>
                                    </div>
                                    <div class="bar-full"></div>
                                </div>
                                <div class="content-evento">
                                    <?php echo $value['descr']; ?>
                                </div>
                            </div>


                            <?php endforeach; 

                                $evento = "select * from evento where active = 1";
                                $prepare = $pdo->prepare($evento);
                                $prepare->execute();

                                if($prepare->rowCount() <= 0):
                                    
                            ?>


                                <div class="none-eventos">
                                    Não há eventos no momento.
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="page">
                    <div class="top-writers">
                <div class="title">
                    <h1>Ranking de Usuários</h1>
                </div>
                <div class="tops">
                    
                    <div class="user">
                        <div class="info">
                            <?php 
                                $t = 0;
                                if(!isset($topProfs[$t])){
                                    $to_show_id = '<a href="#">';
                                }
                                else{
                                    $to_show_id = '<a target="_blank" href="profile.php?profile='.$topProfs[ $t].'">';
                                }

                                echo $to_show_id;
                                    if(isset($topUsers[$t])) echo ''.$topUsers[$t].''; 
                                    else echo "Ninguém";
                                echo '</a>';

                                $t++;
                            ?>
                        </div>
                        <div class="bar">

                        </div>
                    </div>
                    <div class="user">
                        <div class="info">
                            <?php 
                                if(!isset($topProfs[$t])){
                                    $to_show_id = '<a href="#">';
                                }
                                else{
                                    $to_show_id = '<a target="_blank" href="profile.php?profile='.$topProfs[ $t].'">';
                                }

                                echo $to_show_id;
                                    if(isset($topUsers[$t])) echo ''.$topUsers[$t].''; 
                                    else echo "Ninguém";
                                echo '</a>';

                                $t++;
                            ?>
                        </div>
                        <div class="bar">
                            
                        </div>
                    </div>
                    <div class="user">
                        <div class="info">
                            <?php 
                                if(!isset($topProfs[$t])){
                                    $to_show_id = '<a href="#">';
                                }
                                else{
                                    $to_show_id = '<a target="_blank" href="profile.php?profile='.$topProfs[ $t].'">';
                                }

                                echo $to_show_id;
                                    if(isset($topUsers[$t])) echo ''.$topUsers[$t].''; 
                                    else echo "Ninguém";
                                echo '</a>';

                                $t++;
                            ?>
                        </div>
                        <div class="bar">
                            
                        </div>
                    </div>
                    
                </div>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    
        include "includes/footer.php";
    
    ?>
    <script src="../js/menu.js"></script>
    <script src="../js/central2.js?v=1.012344"></script>
</body>
</html>