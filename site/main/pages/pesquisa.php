<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";

    $pesquisa = '';
    if(isset($_GET['busca']))$pesquisa = $_GET['busca'];

    $perfil = returnProfileId($_SESSION['email']);

    if($pesquisa = "novo"){
        $pesquisa = "#";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/menu.css?v=1.01">
    <link rel="stylesheet" href="../css/pesquisa.css?v=1.01">
    <title>Pesquisa</title>
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
                    <li><a href="writerHub.php" target="_blank" rel="noopener noreferrer">Criação</a></li>
                    <div class="search-menu">
                        <form action="pesquisa.php" method="get">
                            <div class="search-box">
                                <button class="btn-search"><i class="fas fa-search"></i></button>
                                <input required style="background: transparent !important;" id="search-thing" type="text" name="busca" class="input-search" placeholder="Pesquisar história........">
                            </div>
                        </form>
                    </div>
                </ul>
                <!--<img src="https://clipart-library.com/images/rcLoyAzKi.png" alt="" srcset="">-->
            </div>
        </div>
    </div>
    <div class="nav">
        <div class="go-back" onclick="acentral()">
            <i class="fa-solid fa-chevron-left"></i>
        </div>
        <div class="logo-pic">
            <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
        </div>
        <div class="go-menu" onclick="menu_appear()">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
    <div class="search-bar-container">
        <form method="get" action="pesquisa.php">
            <div class="bar">
                <div class="search-in">
                    <input type="text" name="busca" id="" class="searchbar" placeholder="Pesquisar por histórias">
                    <button><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="main">
        <div class="results">
            <div class="title-r">
                <h1>Resultados<h1>
            </div>
            <div class="res">
            
            <!--<a style="margin: 2vw;" href='central.php'>Volta</a>-->
            <?php
                if($_SERVER["REQUEST_METHOD"] == "GET"){
                    $titulos = array();
                    $i = 0;

                    if(isset($_GET['busca']) && $_GET['busca'] != ""){

                        $pesquisa = $_GET['busca'];
                        $sql = "SELECT * FROM story where status = 3 order by id_story desc ";
                        $prepare = $pdo->prepare($sql);
                        $prepare->execute();

                        if($prepare->rowCount() == 0){
                            echo "<div class='no-res-title'>Não há resultados.</div>";
                            exit;
                        }

                        foreach($pdo->query($sql) as $key => $value){
                            $titulos[$i][0] = $value["nome"];
                            $sim = similar_text($titulos[$i][0], $pesquisa, $perc);
                            $titulos[$i][1] = $perc;


                            $titulos[$i][2] = $value["id_story"];
                            
                            $sql = "SELECT id_page FROM page where type = 0 and fk_id_story = ".$titulos[$i][2];

                            foreach($pdo->query($sql) as $key => $value){
                                $page = $value['id_page'];

                                $sql = "select left(texto, 50) as sample from history where fk_id_page = ".$page;

                                foreach($pdo->query($sql) as $key => $value){
                                    $titulos[$i][3] = $value['sample'];
                                }
                            }

                            $i++;
                        }

                        $key_values = array_column($titulos, 1); 
                        array_multisort($key_values, SORT_DESC, $titulos);

                        if($titulos[0][1] == 0){ 

                            echo "<div class='no-res-title'>Não há resultados para essa pesquisa. Tente novamente considerando que a pesquisa diferencia letras maiúsculas e minúsculas. <br><br> Conteúdos Relacionados:</div>";

                            for($i = 0; $i < sizeof($titulos); $i++){

                                if($i == 10)break;

                                $check = "SELECT * FROM question_user, question, story WHERE question_user.fk_id_profile = $perfil and story.id_story = question.fk_id_story and question.id_question = question_user.fk_id_question and story.id_story = ".$titulos[$i][2];
                                $prepare = $pdo->prepare($check);
                                $prepare->execute();

                                if($prepare->rowCount() == 0){

                                    $check = "SELECT * FROM error_user WHERE fk_id_profile = $perfil and fk_id_story = ".$titulos[$i][2];
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

                                    $check = "SELECT * FROM score WHERE fk_id_story = ".$titulos[$i][2]." and fk_id_profile = ".$perfil;
                                    $prepare = $pdo->prepare($check);
                                    $prepare->execute();

                                    if($prepare->rowCount() == 0){

                                        $titulos[$i][4] = "<i class='fa-solid fa-check readqm read'></i>";
                                        
                                    }
                                    else{
                                        $titulos[$i][4] = "<i class='fa-solid readqm fa-star'></i>";
                                    }
                                }

                                echo "<div class='action' onclick='story(".$titulos[$i][2].")'><h3>". $titulos[$i][0] ."</h3><p>".$titulos[$i][3]."...</p>".$titulos[$i][4]."</div>";
                            }  

                        }else{
                        
                            for($i = 0; $i < sizeof($titulos); $i++){

                                if($titulos[$i][1] == 0) break;
                                if($i == 10)break;

                                $check = "SELECT * FROM question_user, question, story WHERE question_user.fk_id_profile = $perfil and story.id_story = question.fk_id_story and question.id_question = question_user.fk_id_question and story.id_story = ".$titulos[$i][2];
                                $prepare = $pdo->prepare($check);
                                $prepare->execute();

                                if($prepare->rowCount() == 0){

                                    $check = "SELECT * FROM error_user WHERE fk_id_profile = $perfil and fk_id_story = ".$titulos[$i][2];
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

                                    $check = "SELECT * FROM score WHERE fk_id_story = ".$titulos[$i][2]." and fk_id_profile = ".$perfil;
                                    $prepare = $pdo->prepare($check);
                                    $prepare->execute();

                                    if($prepare->rowCount() == 0){

                                        $titulos[$i][4] = "<i class='fa-solid fa-check readqm read'></i>";
                                        
                                    }
                                    else{
                                        $titulos[$i][4] = "<i class='fa-solid readqm fa-star'></i>";
                                    }
                                }

                                echo "<div class='action' onclick='story(".$titulos[$i][2].")'><h3>". $titulos[$i][0] ."</h3><p>".$titulos[$i][3]."...</p>".$titulos[$i][4]."</div>";

                            }  
                        } 

                    }else{
                        echo "Sua pesquisa está vazia! Tente novamente";
                    }
                }
            ?>
            </div>
        </div>
    </div>
<div id="hidden_form_container" style="display:none;"></div>

<script>
    function story(n) {
        var theForm, newInput1;
        theForm = document.createElement('form');
        theForm.action = 'story.php';
        theForm.method = 'get';
        newInput1 = document.createElement('input');
        newInput1.type = 'hidden';
        newInput1.name = 'input_1';
        newInput1.value = n;
        theForm.appendChild(newInput1);
        document.getElementById('hidden_form_container').appendChild(theForm);
        theForm.submit();
    }
</script>
<script src="../js/pesquisa.js"></script>
<script src="../js/menu.js"></script>
</body>
</html>